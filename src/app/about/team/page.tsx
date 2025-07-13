import React from 'react';
import { Metadata } from 'next';
import Image from 'next/image';

export const metadata: Metadata = {
  title: 'Our Team | InboxTales - Digital Agency',
  description: 'Meet the talented team behind InboxTales. Our experts are passionate about creating innovative digital solutions that drive business growth.',
  keywords: 'team, about us, digital agency team, experts, professionals, InboxTales team',
};

export default function TeamPage() {
  return (
    <div className="team-page">
      {/* Hero Section */}
      <section className="hero-section">
        <div className="container">
          <div className="row">
            <div className="col-lg-8 mx-auto text-center">
              <h1 className="hero-title">Meet Our Team</h1>
              <p className="hero-subtitle">
                Passionate experts dedicated to creating innovative digital solutions
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* Team Overview */}
      <section className="team-overview py-5">
        <div className="container">
          <div className="row">
            <div className="col-lg-8 mx-auto text-center mb-5">
              <h2>Our Story</h2>
              <p>
                At InboxTales, we believe that great digital solutions come from great teams. 
                Our diverse group of experts brings together years of experience in technology, 
                design, and business strategy to deliver exceptional results for our clients.
              </p>
            </div>
          </div>
          
          <div className="row g-4">
            <div className="col-lg-4 col-md-6">
              <div className="team-member">
                <div className="member-image">
                  <Image src="/images/about/founder.png" alt="Team Member" width={160} height={160} />
                </div>
                <div className="member-info">
                  <h3>John Smith</h3>
                  <p className="position">CEO & Founder</p>
                  <p className="bio">
                    15+ years of experience in digital transformation and technology leadership. 
                    Passionate about helping businesses leverage technology for growth.
                  </p>
                </div>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="team-member">
                <div className="member-image">
                  <Image src="/images/about/founder.png" alt="Team Member" width={160} height={160} />
                </div>
                <div className="member-info">
                  <h3>Sarah Johnson</h3>
                  <p className="position">CTO</p>
                  <p className="bio">
                    Technology expert with deep expertise in scalable architecture and 
                    emerging technologies. Leads our technical strategy and innovation.
                  </p>
                </div>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="team-member">
                <div className="member-image">
                  <Image src="/images/about/founder.png" alt="Team Member" width={160} height={160} />
                </div>
                <div className="member-info">
                  <h3>Mike Chen</h3>
                  <p className="position">Lead Developer</p>
                  <p className="bio">
                    Full-stack developer with expertise in modern web technologies. 
                    Passionate about clean code and user experience.
                  </p>
                </div>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="team-member">
                <div className="member-image">
                  <Image src="/images/about/founder.png" alt="Team Member" width={160} height={160} />
                </div>
                <div className="member-info">
                  <h3>Emily Davis</h3>
                  <p className="position">UX/UI Designer</p>
                  <p className="bio">
                    Creative designer focused on creating intuitive and beautiful user experiences. 
                    Expert in user research and design systems.
                  </p>
                </div>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="team-member">
                <div className="member-image">
                  <Image src="/images/about/founder.png" alt="Team Member" width={160} height={160} />
                </div>
                <div className="member-info">
                  <h3>David Wilson</h3>
                  <p className="position">DevOps Engineer</p>
                  <p className="bio">
                    Infrastructure specialist with expertise in cloud platforms and automation. 
                    Ensures our solutions are scalable and secure.
                  </p>
                </div>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="team-member">
                <div className="member-image">
                  <Image src="/images/about/founder.png" alt="Team Member" width={160} height={160} />
                </div>
                <div className="member-info">
                  <h3>Lisa Brown</h3>
                  <p className="position">Project Manager</p>
                  <p className="bio">
                    Experienced project manager who ensures smooth delivery and client satisfaction. 
                    Expert in agile methodologies and team coordination.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Values Section */}
      <section className="values-section py-5 bg-light">
        <div className="container">
          <div className="row">
            <div className="col-lg-8 mx-auto text-center mb-5">
              <h2>Our Values</h2>
              <p>The principles that guide everything we do</p>
            </div>
          </div>
          
          <div className="row g-4">
            <div className="col-lg-4 col-md-6">
              <div className="value-card text-center">
                <div className="value-icon">
                  <i className="ri-heart-line"></i>
                </div>
                <h4>Passion</h4>
                <p>We're passionate about technology and its power to transform businesses</p>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="value-card text-center">
                <div className="value-icon">
                  <i className="ri-shield-check-line"></i>
                </div>
                <h4>Quality</h4>
                <p>We never compromise on quality and always deliver our best work</p>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="value-card text-center">
                <div className="value-icon">
                  <i className="ri-team-line"></i>
                </div>
                <h4>Collaboration</h4>
                <p>We believe in the power of teamwork and close collaboration with clients</p>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="value-card text-center">
                <div className="value-icon">
                  <i className="ri-lightbulb-line"></i>
                </div>
                <h4>Innovation</h4>
                <p>We constantly explore new technologies and approaches to solve problems</p>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="value-card text-center">
                <div className="value-icon">
                  <i className="ri-user-line"></i>
                </div>
                <h4>Client Focus</h4>
                <p>Our clients' success is our success - we're committed to their growth</p>
              </div>
            </div>
            
            <div className="col-lg-4 col-md-6">
              <div className="value-card text-center">
                <div className="value-icon">
                  <i className="ri-time-line"></i>
                </div>
                <h4>Reliability</h4>
                <p>We deliver on our promises and maintain the highest standards of reliability</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="cta-section py-5">
        <div className="container">
          <div className="row">
            <div className="col-lg-8 mx-auto text-center">
              <h2>Ready to Work with Our Team?</h2>
              <p>
                Let's discuss your project and see how our team can help you achieve your goals. 
                Get in touch to start the conversation.
              </p>
              <a href="/contact" className="btn btn-primary btn-lg">
                Get in Touch
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
} 