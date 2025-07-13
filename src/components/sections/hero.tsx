'use client'
import { Link as Linkscroll } from 'react-scroll';
import SlideUp from "@/utils/animations/slideUp"
import Typewriter from 'typewriter-effect';
import Image from 'next/image';

const Hero = () => {
    return (
        <section id="home" className="main-hero-area">
            <div className="container">
                <div className="row align-items-center">
                    <div className="col-lg-12">
                        <SlideUp className="hero-content position-relative text-center">
                            <h3 className="hero-subtitle" style={{ letterSpacing: '-0.02em' }}>
                                <i className="ri-mail-line" />Every inbox is the start of a success story
                            </h3>
                            <h2 className="hero-title" style={{ 
                                letterSpacing: '-0.04em',
                                fontWeight: '800',
                                textAlign: 'center'
                            }}>
                                <div style={{ 
                                    display: 'flex', 
                                    alignItems: 'baseline',
                                    justifyContent: 'center',
                                    width: '100%'
                                }}>
                                    We Craft
                                    <div className="text-[#fa4616] hero-typewriter" style={{ 
                                        display: 'inline-block',
                                        letterSpacing: '-0.04em',
                                        textAlign: 'left',
                                        marginLeft: '0.5rem',
                                        minWidth: '280px'
                                    }}>
                                        <Typewriter
                                            options={{
                                                strings: [
                                                    'Web Apps',
                                                    'Digital Products',
                                                    'Brand Experiences',
                                                    'Growth Systems',
                                                ],
                                                autoStart: true,
                                                loop: true,
                                                delay: 75,
                                                deleteSpeed: 50,
                                            }}
                                        />
                                    </div>
                                </div>
                            </h2>
                            <p className="hero-description" style={{ textAlign: 'center', maxWidth: '600px', margin: '0 auto' }}>
                                Build websites, apps & marketing systems that spark business growth — all in one place. 
                                Your journey begins the moment we say &#39;hello.&#39;
                            </p>
                            <div className="hero-btns">
                                <Linkscroll smooth={true} to="contact" className="theme-btn btn-brand">Start Your Story</Linkscroll>
                            </div>
                        </SlideUp>
                    </div>
                </div>
            </div>
        </section>
    )
}

export default Hero