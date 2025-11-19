<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app-new')] class extends Component
{


};
?>
<div>
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
</div>