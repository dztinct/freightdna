<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Livewire\Attributes\Title;


new #[Layout('layouts.app-new')] #[Title('Home | FreightDNA')]
class extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $message = '';

    public function submit()
    {
        $validated = $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'message'    => 'required|string|min:5',
        ]);

        try{
            $mail_data = [
                'recipient' => 'you@freightdna.com',
                'fromName'   => $this->first_name . ' ' . $this->last_name,
                'fromEmail' => $this->email,
                'body' => $this->message
        ];

        Mail::send('email.contact-template', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                    ->from('you@freightdna.com', 'FreightDNA') // ✅ use your authenticated email
                    ->replyTo($mail_data['fromEmail'], $mail_data['fromName']) // ✅ user’s email for replies
                    ->subject('FreightDNA Contact Form — ' . $mail_data['fromName']);

        });

        session()->flash('success', 'Your message has been sent successfully.');

        $this->reset(['first_name', 'last_name', 'email', 'message']);

        return redirect()->back()->with('success', 'Message sent successfully.');
        }catch(\Exception $e){
            Log::error('Email sending failed with exception.', [
            'error' => $e->getMessage(),
            'data'  => $mail_data ?? []
        ]);

        return redirect()->back()->with('error', 'An error occurred while sending the message.');
        }
    }

};
?>

<div>

        <div class="ftco-blocks-cover-1">
          <div class="ftco-cover-1 overlay" style="background-image: url('images/depot_hero_1.jpg')">
            <div class="container">
              <div class="row align-items-center justify-content-center text-center">
                <div class="col-lg-6">
                  <h1>Transportations &amp; Procurements</h1>
                  <p class="mb-5">We are dedicated to giving the best services and giving you the best shipping and procurement you can trust.</p>
                  <form action="#">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Your tracking number">
                      {{-- <input type="submit" class="btn btn-primary text-white px-4" value="Track Now"> --}}
                      <a href="{{ route('shipment.track') }}">
                      <div class="pt-3 btn bg-[#1649A2] text-white">
                            Track
                        </div>
                    </a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END .ftco-cover-1 -->
          <div class="site-section ftco-service-image-1 pb-5">
            <div class="container">
              <div class="owl-carousel owl-all">
                <div class="service text-center">
                  <a href="#"><img src="images/depot_img_2.jpg" alt="Image" class="img-fluid"></a>
                  <div class="px-md-3">
                    <h3><a href="#">Air Shipping</a></h3>
                    <p>When time is critical, trust our air shipping. Experience accelerated delivery that cuts days off your supply chain</p>
                  </div>
                </div>
                <div class="service text-center">
                  <a href="#"><img src="images/depot_img_3.jpg" alt="Image" class="img-fluid"></a>
                  <div class="px-md-3">
                    <h3><a href="#">Sea Shipping</a></h3>
                    <p>Maximize your cargo efficiency with world-class sea shipping. Get cost-effective, high-capacity routes that deliver bulk goods reliably across the globe</p>
                  </div>
                </div>
                <div class="service text-center">
                    <a href="#"><img src="images/depot_img_1.jpg" alt="Image" class="img-fluid"></a>
                    <div class="px-md-3">
                      <h3><a href="#">Procurements</a></h3>
                      <p>Move beyond simple purchasing. Our strategic procurement platform secure the best value and quality for your essential materials, optimizing every spend</p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
  
        </div>
  
        <div class="site-section bg-light" id="services-section">
          <div class="container">
            <div class="row mb-5 justify-content-center">
              <div class="col-md-7 text-center">
                <div class="block-heading-1">
                  <h2>Services</h2>
                  <p>We are your dedicated partner for sustainable growth. Our comprehensive professional services, spanning strategic consulting and managed support, are designed to deliver custom, results-driven solutions. Partner with our experts to solve complex challenges, boost operational efficiency, and secure your competitive edge.</p>
                </div>
              </div>
            </div>
            <div class="owl-carousel owl-all">
                <div class="block__35630 text-center">
                    <div class="icon mb-0">
                      <span class="flaticon-airplane"></span>
                    </div>
                    <h3 class="mb-3">Air Freight</h3>
                    <p>Reliable air freight services designed for world-class efficiency, speed, security, and global reach. </p>
                </div>

              <div class="block__35630 text-center">
                <div class="icon mb-0">
                  <span class="flaticon-ferry"></span>
                </div>
                <h3 class="mb-3">Sea Freight</h3>
                <p>Reliable sea freight services providing secure, timely, and cost-effective international shipping solutions. </p>
              </div>
  

  
              <div class="block__35630 text-center">
                <div class="icon mb-0">
                  <span class="flaticon-add"></span>
                </div>
                <h3 class="mb-3">Procurement</h3>
                <p>Streamlined procurement solutions ensuring cost-effective, timely, and reliable sourcing for global logistics.</p>
              </div>
  
            </div>
          </div>
        </div>
  
  
  
  
        <div class="site-section" id="about-section">
  
          <div class="container">
            <div class="row mb-5 justify-content-center">
              <div class="col-md-7 text-center">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                  <h2>About Us</h2>
                  <p>We provide seamless, end-to-end shipping and procurement solutions, designed to simplify your global supply chain. From sourcing quality materials and managing vendor relationships to optimizing freight logistics and ensuring timely delivery, our platform gives you the visibility and control needed to reduce costs and minimize risk. Let us handle the complexity so you can focus on growing your core business.</p>
                </div>
              </div>
            </div>
          </div>
  
        </div>
  
        <div class="site-section bg-light" id="about-section">
          <div class="container">
            <div class="row justify-content-center mb-4 block-img-video-1-wrap">
              <div class="col-md-12 mb-5">
                <figure class="block-img-video-1" data-aos="fade">
                  {{-- <a href="https://vimeo.com/45830194" data-fancybox data-ratio="2"> --}}
                  {{-- <span class="icon"><span class="icon-play"></span></span> --}}
                  <img src="images/about-img.jpg" alt="Image" class="img-fluid">
                </a>
                </figure>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="">
                    <div class="block-counter-1">
                      <span class="number"><span data-number="4">0</span>+</span>
                      <span class="caption">Years in Service</span>
                    </div>
                  </div>
                  <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="block-counter-1">
                      <span class="number"><span data-number="32">0</span>+</span>
                      <span class="caption">Employees</span>
                    </div>
                  </div>
                  <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="block-counter-1">
                      <span class="number"><span data-number="13">0</span>+</span>
                      <span class="caption">Covered Countries</span>
                    </div>
                  </div>
                  <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="block-counter-1">
                      <span class="number"><span data-number="27">0</span>+</span>
                      <span class="caption">Couriers</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="site-section" id="team-section">
          <div class="container">
            <div class="row mb-5 justify-content-center">
              <div class="col-md-7 text-center">
                <div class="block-heading-1" data-aos="fade-up" data-aos-delay="">
                  <h2>Our Staff</h2>
                  <p>Meet Our Ever Dynamic Team. Passionate and Committed</p>
                </div>
              </div>
            </div>
  
            <div class="owl-carousel owl-all mb-5">
              <div class="block-team-member-1 text-center rounded h-100">
                <figure>
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle">
                </figure>
                <h3 class="font-size-20 text-black mt-2">Justice Benson</h3>
                <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Procurement Manager</span>
                <p class="mb-4">Sourcing goods, managing supplier relationships, negotiating contracts, and ensuring cost-effective purchasing.</p>
                {{-- <div class="block-social-1">
                  <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a>
                  <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a>
                  <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a>
                </div> --}}
              </div>
  
              <div class="block-team-member-1 text-center rounded h-100">
                <figure>
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded-circle">
                </figure>
                <h3 class="font-size-20 text-black mt-2">Grace Daniels</h3>
                <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Logistics Coordinator</span>
                <p class="mb-4">Day-to-day management of shipments, coordinating transportation schedules (road, sea, air), tracking cargo, and documentation.</p>
                {{-- <div class="block-social-1">
                  <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a>
                  <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a>
                  <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a>
                </div> --}}
              </div>
  
              <div class="block-team-member-1 text-center rounded h-100">
                <figure>
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid rounded-circle">
                </figure>
                <h3 class="font-size-20 text-black mt-2">Frank Williams</h3>
                <span class="d-block font-gray-5 letter-spacing-1 text-uppercase font-size-12 mb-3">Freight Forwarding Agent</span>
                <p class="mb-4">Intermediary between shippers & all transportation services, managing all accounts & arranging movement of goods.</p>
                {{-- <div class="block-social-1">
                  <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-facebook"></span></a>
                  <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-twitter"></span></a>
                  <a href="#" class="btn border-w-2 rounded primary-primary-outline--hover"><span class="icon-instagram"></span></a>
                </div> --}}
              </div>
  
              
  
  
          </div>
        </div>
  
        <div class="block__73694 site-section border-top" id="why-us-section">
          <div class="container">
            <div class="row d-flex no-gutters align-items-stretch">
  
              <div class="col-12 col-lg-6 block__73422 order-lg-2" style="background-image: url('images/about-image.jpg');" data-aos="fade-left" data-aos-delay="">
              </div>
  
  
  
              <div class="col-lg-5 mr-auto p-lg-5 mt-4 mt-lg-0 order-lg-1" data-aos="fade-right" data-aos-delay="">
                <h2 class="mb-4 text-black">Why FreightDNA</h2>
                <p>We deliver total supply chain control and proven cost reduction, guaranteeing compliant, on-time delivery so you can focus only on growth.</p>
  
                <ul class="ul-check primary list-unstyled mt-5">
                  <li>Cargo express</li>
                  <li>Secure Services</li>
                  <li>Secure Warehouseing</li>
                  <li>Cost savings</li>
                  <li>Proven by great companies</li>
                </ul>
  
              </div>
  
            </div>
          </div>
        </div>
  
  
        <div class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
          <div class="container">
  
            <div class="text-center mb-5">
              <div class="block-heading-1">
                <h2>Happy Clients</h2>
              </div>
            </div>
  
            <div class="owl-carousel nonloop-block-13">
              <div>
                <div class="block-testimony-1 text-center">
  
                  <blockquote class="mb-4">
                    <p>&ldquo;Switching our logistics to this team was the best decision we made this year. The real-time tracking and clear communication cut down our lead times significantly. They truly deliver end-to-end efficiency without the usual hassle. &rdquo;</p>
                  </blockquote>
  
                  {{-- <figure>
                    <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle mx-auto">
                  </figure> --}}
                  <h3 class="font-size-20 text-black">F. Ricky, Head of Operations</h3>
                </div>
              </div>
  
              <div>
                <div class="block-testimony-1 text-center">
                  <blockquote class="mb-4">
                    <p>&ldquo;Their procurement services are unmatched. They didn't just find us better suppliers; they negotiated contracts that led to a 15% reduction in our material costs within the first quarter. A crucial partner for scaling our business.&rdquo;</p>
                  </blockquote>
                  {{-- <figure>
                    <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded-circle mx-auto">
                  </figure> --}}
                  <h3 class="font-size-20 mb-4 text-black">D. Kenny, Operations Director</h3>
  
                </div>
              </div>
  
              <div>
                <div class="block-testimony-1 text-center">
  
  
                  <blockquote class="mb-4">
                    <p>&ldquo;In logistics, trust is everything. This company has consistently proven to be the most reliable link in our supply chain. Shipments are always on time, and their documentation is impeccable. A truly dependable partner.&rdquo;</p>
                  </blockquote>
  
                  {{-- <figure>
                    <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle mx-auto">
                  </figure> --}}
                  <h3 class="font-size-20 text-black">M. Collins, Procurement Lead</h3>
  
  
                </div>
              </div>
  
              <div>
                <div class="block-testimony-1 text-center">
                  <blockquote class="mb-4">
                    <p>&ldquo;We rely on them for all our cross-border shipping, and their customs and compliance handling is flawless. Never a delay due to paperwork. Highly reliable, professional, and they make international logistics feel easy.&rdquo;</p>
                  </blockquote>
  
                  {{-- <figure>
                    <img src="images/person_3.jpg" alt="Image" class="img-fluid rounded-circle mx-auto">
                  </figure> --}}
                  <h3 class="font-size-20 mb-4 text-black">S. Nguyen, Inventory manager</h3>
  
                </div>
              </div>
  
  
            </div>
  
          </div>
        </div>

      </div>
  
  
  
      <div class="site-section bg-light" id="contact-section">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
              <div class="block-heading-1">
                <h2>Contact Us</h2>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-8 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <form wire:submit.prevent="submit">

                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <input type="text"
                                    class="form-control"
                                    placeholder="First name"
                                    wire:model="first_name">
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="text"
                                    class="form-control"
                                    placeholder="Last name"
                                    wire:model="last_name">
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="email"
                                    class="form-control"
                                    placeholder="Email address"
                                    wire:model="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control"
                                    placeholder="Write your message."
                                    wire:model="message"
                                    cols="30" rows="10"></textarea>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                {{-- <button type="submit"
                                    class="btn btn-block btn-primary text-white py-3 px-5">
                                    Send Message
                                </button> --}}

                                <button type="submit"
                                class="px-6 py-2 bg-[#1649A2] text-white"
                                wire:loading.attr="disabled">
                                <svg wire:loading wire:target="submit"
                                    class="animate-spin h-5 w-5 text-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                   <circle class="opacity-25" cx="12" cy="12" r="10"
                                           stroke="currentColor" stroke-width="4"></circle>
                                   <path class="opacity-75" fill="currentColor"
                                         d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                   </path>
                                </svg>
                                <span wire:loading.remove wire:target="submit">Send Message</span>
                            </button>
                            
                            </div>
                        </div>

                    </form>
                    @if (session('success'))
                        <div class="alert alert-success text-center mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-success text-center mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
            </div>
            
          </div>
        </div>
      </div>

</div>


