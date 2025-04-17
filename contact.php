<?php 
    $title='Contact Us';
    $subTitle = 'Contact Us';
    $css = '<link rel="stylesheet" href="assets/fonts/webfonts/syne/stylesheet.css">';

    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Debug: Log POST data
        error_log("Form submitted with data: " . print_r($_POST, true));

        $name = isset($_POST['contact-name']) ? $_POST['contact-name'] : '';
        $email = isset($_POST['contact-email']) ? $_POST['contact-email'] : '';
        $phone = isset($_POST['contact-phone']) ? $_POST['contact-phone'] : '';
        $message = isset($_POST['contact-message']) ? $_POST['contact-message'] : '';

        // Validate required fields
        if (empty($name) || empty($email) || empty($phone) || empty($message)) {
            $error_message = "Please fill in all required fields.";
            $response = array('status' => 'error', 'message' => $error_message);
        } else {
            $to = "contact@inboxtales.com";
            $subject = "New Contact Form Submission from " . $name;
            
            $email_content = "Name: " . $name . "\n";
            $email_content .= "Email: " . $email . "\n";
            $email_content .= "Phone: " . $phone . "\n\n";
            $email_content .= "Message:\n" . $message;

            $headers = "From: " . $email . "\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            // Debug: Log email attempt
            error_log("Attempting to send email to: " . $to);
            error_log("Email headers: " . $headers);
            error_log("Email content: " . $email_content);

            // Try to send email
            $mail_sent = mail($to, $subject, $email_content, $headers);
            
            // Debug: Log result
            error_log("Mail function result: " . ($mail_sent ? "true" : "false"));

            if ($mail_sent) {
                $success_message = "Thank you for your message. We will get back to you soon!";
                $response = array('status' => 'success', 'message' => $success_message);
            } else {
                $error_message = "Sorry, there was an error sending your message. Please try again later.";
                $error_message .= " Error: " . error_get_last()['message'];
                $response = array('status' => 'error', 'message' => $error_message);
            }
        }

        // If this is an AJAX request, return JSON response
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
?>
<?php include './partials/layouts/layoutTop.php' ?>

<!-- ...::: Contact From Section Start :::... -->
<section class="section-contact-form">
    <!-- Section Space -->
    <div class="section-space">
        <!-- Section Container -->
        <div class="container">
            <!-- Contact Form Area -->
            <div class="grid grid-cols-1 items-end gap-x-20 gap-y-10 lg:grid-cols-[1fr_minmax(0,420px)]">
                <!-- Contact Form Left Block - Form-->
                <div class="jos" data-jos_animation="fade-left">
                    <!-- Section Block -->
                    <div class="section-block mb-10 md:mb-[60px] xl:mb-20">
                        <h1 class="text-4xl font-bold">
                            Contact us for a
                            <span>
                                <img src="assets/img/elemnts/shape-light-lime-5-arms-star.svg" alt="Star shape decoration" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                            </span>
                            personal experience
                        </h1>
                    </div>
                    <!-- Section Block -->

                    <div id="form-message" class="mb-6 hidden p-4 rounded-lg"></div>

                    <!-- Contact Form -->
                    <form id="contact-form" class="flex flex-col gap-y-6 rounded-[30px] border border-black p-[30px]">
                        <!-- Form Group -->
                        <div>
                            <label for="contact-name" class="mb-3 block pl-6 text-base font-bold">Your name</label>
                            <input type="text" name="entry.1418881115" id="contact-name" class="w-full rounded-[50px] border border-black bg-colorIvory px-8 py-4 text-base font-bold" placeholder="Enter your full name" required />
                        </div>
                        <!-- Form Group -->
                        <!-- Form Group -->
                        <div>
                            <label for="contact-email" class="mb-3 block pl-6 text-base font-bold">Email Address</label>
                            <input type="email" name="entry.1163358052" id="contact-email" class="w-full rounded-[50px] border border-black bg-colorIvory px-8 py-4 text-base font-bold" placeholder="Enter your email address" required />
                        </div>
                        <!-- Form Group -->
                        <!-- Form Group -->
                        <div>
                            <label for="contact-phone" class="mb-3 block pl-6 text-base font-bold">Phone No</label>
                            <input type="tel" name="entry.944497278" id="contact-phone" class="w-full rounded-[50px] border border-black bg-colorIvory px-8 py-4 text-base font-bold" placeholder="+91 XXXXX XXXXX" required />
                        </div>
                        <!-- Form Group -->
                        <!-- Form Group -->
                        <div>
                            <label for="contact-message" class="mb-3 block pl-6 text-base font-bold">Write your message here...</label>
                            <textarea name="entry.420825078" id="contact-message" class="min-h-52 w-full rounded-[20px] border border-black bg-colorIvory px-8 py-4 text-base font-bold" placeholder="Tell us about your project requirements"></textarea>
                        </div>
                        <!-- Form Group -->
                        <!-- Form Group -->
                        <div>
                            <button type="submit" class="btn-black">
                                Send Message
                            </button>
                        </div>
                        <!-- Form Group -->
                    </form>
                    <!-- Contact Form -->
                </div>
                <!-- Contact Form Left Block - Form-->

                <!-- Contact Form Right Block - Image-->
                <div class="jos hidden overflow-hidden rounded-[20px] border-2 border-black lg:block lg:border-[5px]" data-jos_animation="fade-right">
                    <img src="assets/img/Contact us.png" alt="InboxTales contact page image" width="456" height="731" class="h-full w-full object-cover" />
                </div>
                <!-- Contact Form Right Block - Image-->
            </div>
            <!-- Contact Form Area -->
        </div>
        <!-- Section Container -->
    </div>
    <!-- Section Space -->
</section>

<script>
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Show loading state
    const submitButton = this.querySelector('button[type="submit"]');
    const originalButtonText = submitButton.innerHTML;
    submitButton.innerHTML = 'Sending...';
    submitButton.disabled = true;

    // Get form data
    const formData = new FormData(this);
    
    // Log form submission
    console.log('Form submission started');
    console.log('Form data:', {
        name: this.querySelector('[name="entry.1418881115"]').value,
        email: this.querySelector('[name="entry.1163358052"]').value,
        phone: this.querySelector('[name="entry.944497278"]').value,
        message: this.querySelector('[name="entry.420825078"]').value
    });

    // Create hidden iframe for form submission
    const iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    document.body.appendChild(iframe);

    // Create form for iframe submission
    const iframeForm = document.createElement('form');
    iframeForm.method = 'POST';
    iframeForm.action = 'https://docs.google.com/forms/d/e/1FAIpQLSfEYIetYpwk6fnFuia7bRJ8f8uKTBltMraD868RSGu0Wv0HHQ/formResponse';
    iframeForm.target = iframe.name;

    // Add form fields to iframe form
    formData.forEach((value, key) => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        iframeForm.appendChild(input);
    });

    // Submit the form in the iframe
    iframe.contentDocument.body.appendChild(iframeForm);
    iframeForm.submit();

    // Show success message
    const messageDiv = document.getElementById('form-message');
    messageDiv.classList.remove('hidden');
    messageDiv.classList.remove('bg-red-100', 'text-red-700');
    messageDiv.classList.add('bg-green-100', 'text-green-700');
    messageDiv.textContent = 'Thank you for your message. We will get back to you soon!';
    
    // Reset form
    this.reset();
    
    // Reset button state
    submitButton.innerHTML = originalButtonText;
    submitButton.disabled = false;

    // Remove iframe after submission
    setTimeout(() => {
        document.body.removeChild(iframe);
    }, 1000);
});
</script>

<!-- ...::: Contact Info Section Start :::... -->
<section class="section-contact-info">
    <!-- Section Space -->
    <div class="section-space-bottom">
        <!-- Section Container -->
        <div class="container">
            <!-- Section Block -->
            <div class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[866px]">
                <h2 class="jos">
                    Contact Information
                    <span>
                        <img src="assets/img/elemnts/shape-light-lime-5-arms-star.svg" alt="Star shape decoration" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                    </span>
                </h2>
            </div>
            <!-- Section Block -->

            <!-- Contact Info List -->
            <ul class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                <!-- Contact Info Item -->
                <li class="jos flex gap-x-6 rounded-[10px] bg-black px-5 py-[30px] xl:px-8 xxl:px-[70px]">
                    <div class="h-auto w-10">
                        <img src="assets/img/icons/icon-buttery-white-phone.svg" alt="Phone icon" width="30" height="30" class="h-auto w-10" />
                    </div>
                    <div class="flex-1">
                        <span class="mb-3 block text-xl font-bold text-colorButteryWhite xl:text-2xl">Call us</span>
                        <div class="flex flex-col text-lg leading-[1.42] lg:text-[21px]">
                            <a href="tel:+919640470432" class="text-colorButteryWhite hover:text-colorLightLime">+91 96404 70432</a>
                        </div>
                    </div>
                </li>
                <!-- Contact Info Item -->
                <!-- Contact Info Item -->
                <li class="jos flex gap-x-6 rounded-[10px] bg-black px-5 py-[30px] xl:px-8 xxl:px-[70px]">
                    <div class="h-auto w-10">
                        <img src="assets/img/icons/icon-buttery-white-mail.svg" alt="Email icon" width="40" height="40" class="h-auto w-10" />
                    </div>
                    <div class="flex-1">
                        <span class="mb-3 block text-xl font-bold text-colorButteryWhite xl:text-2xl">Email us</span>
                        <div class="flex flex-col text-lg leading-[1.42] lg:text-[21px]">
                            <a href="mailto:contact@inboxtales.com" class="text-colorButteryWhite hover:text-colorLightLime">contact@inboxtales.com</a>
                        </div>
                    </div>
                </li>
                <!-- Contact Info Item -->
                <!-- Contact Info Item -->
                <li class="jos flex gap-x-6 rounded-[10px] bg-black px-5 py-[30px] xl:px-8 xxl:px-[70px]">
                    <div class="h-auto w-10">
                        <img src="assets/img/icons/icon-buttery-white-location-marker.svg" alt="Location marker icon" width="40" height="40" class="h-auto w-10" />
                    </div>
                    <div class="flex-1">
                        <span class="mb-3 block text-xl font-bold text-colorButteryWhite xl:text-2xl">Office address</span>
                        <div class="flex flex-col text-lg leading-[1.42] lg:text-[21px]">
                            <address class="not-italic text-colorButteryWhite">
                                Hyderabad
                            </address>
                        </div>
                    </div>
                </li>
                <!-- Contact Info Item -->
            </ul>
            <!-- Contact Info List -->

            <!-- Location Map Block -->
            <div class="jos mt-10 md:mt-[60px] lg:mt-20">
                <div class="h-96 w-full overflow-hidden rounded-[20px] border-2 border-black lg:h-[600px] lg:rounded-[30px] lg:border-[5px]">
                    <img src="assets/img/About us 4.png" alt="InboxTales office location" class="h-full w-full object-cover" />
                </div>
            </div>
            <!-- Location Map Block -->
        </div>
        <!-- Section Container -->
    </div>
    <!-- Section Space -->
</section>
<!-- ...::: Contact Info Section End :::... -->

<!-- Horizontal Line -->
<div class="horizontal-line bg-[#e6e6e6]"></div>
<!-- Horizontal Line -->

<!-- ...::: FAQ Section Start :::... -->
<section class="section-faq">
    <!-- Section Space -->
    <div class="section-space">
        <!-- Section Container -->
        <div class="container">
            <!-- Section Block -->
            <div class="section-block mx-auto mb-10 max-w-[650px] text-center md:mb-[60px] xl:mb-20 xl:max-w-[856px]">
                <h2 class="jos">
                    These FAQs help
                    <span>
                        <img src="assets/img/elemnts/shape-light-lime-5-arms-star.svg" alt="Star shape decoration" width="74" height="70" class="relative inline-block h-auto w-8 after:bg-black md:w-10 lg:w-[57px]" />
                    </span>
                    clients learn about us
                </h2>
            </div>
            <!-- Section Block -->

            <!-- FAQ Area -->
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 lg:grid-cols-2">
                <!-- FAQ List -->
                <ul class="flex flex-col gap-y-10">
                    <!-- FAQ Item -->
                    <li class="jos flex flex-col gap-y-4">
                        <!-- FAQ Header Block -->
                        <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url('assets/img/icons/icon-lightlime-question.svg')]">
                            What services does agency offer?
                        </h4>
                        <!-- FAQ Header Block -->
                        <!-- FAQ Body -->
                        <div class="ml-10 text-[#0C0C0C]">
                            <p>
                                Clients often seek to understand the range of design
                                services an agency provides, such as graphic design, web
                                design, branding.
                            </p>
                            <img src="assets/img/webDevelopment.jpg" alt="Web Development Services" class="mt-4 rounded-lg w-full h-48 object-cover" />
                        </div>
                        <!-- FAQ Body -->
                    </li>
                    <!-- FAQ Item -->
                    <!-- FAQ Item -->
                    <li class="jos flex flex-col gap-y-4">
                        <!-- FAQ Header Block -->
                        <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url('assets/img/icons/icon-lightlime-question.svg')]">
                            What is your design process like?
                        </h4>
                        <!-- FAQ Header Block -->
                        <!-- FAQ Body -->
                        <div class="ml-10 text-[#0C0C0C]">
                            <p>
                                Explaining the design agency's process from initial
                                concept to final delivery helps clients understand what
                                to expect.
                            </p>
                            <img src="assets/img/graphicDesign.jpg" alt="Design Process" class="mt-4 rounded-lg w-full h-48 object-cover" />
                        </div>
                        <!-- FAQ Body -->
                    </li>
                    <!-- FAQ Item -->
                    <!-- FAQ Item -->
                    <li class="jos flex flex-col gap-y-4">
                        <!-- FAQ Header Block -->
                        <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url('assets/img/icons/icon-lightlime-question.svg')]">
                            How much does design work cost?
                        </h4>
                        <!-- FAQ Header Block -->
                        <!-- FAQ Body -->
                        <div class="ml-10 text-[#0C0C0C]">
                            <p>
                                The cost of our design services varies depending on the
                                scope of the project. We provide customized quotes after
                                discussing requirements.
                            </p>
                            <img src="assets/img/DigitalMarketing.jpg" alt="Digital Marketing Services" class="mt-4 rounded-lg w-full h-48 object-cover" />
                        </div>
                        <!-- FAQ Body -->
                    </li>
                    <!-- FAQ Item -->
                </ul>
                <!-- FAQ List -->

                <!-- FAQ List -->
                <ul class="flex flex-col gap-y-10">
                    <!-- FAQ Item -->
                    <li class="jos flex flex-col gap-y-4">
                        <!-- FAQ Header Block -->
                        <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url('assets/img/icons/icon-lightlime-question.svg')]">
                            What's your design process like?
                        </h4>
                        <!-- FAQ Header Block -->
                        <!-- FAQ Body -->
                        <div class="ml-10 text-[#0C0C0C]">
                            <p>
                                Our design process typically involves discovery, concept
                                development, design, revisions based on feedback, and
                                finalization.
                            </p>
                            <img src="assets/img/appDevelopment.jpg" alt="App Development Process" class="mt-4 rounded-lg w-full h-48 object-cover" />
                        </div>
                        <!-- FAQ Body -->
                    </li>
                    <!-- FAQ Item -->
                    <!-- FAQ Item -->
                    <li class="jos flex flex-col gap-y-4">
                        <!-- FAQ Header Block -->
                        <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url('assets/img/icons/icon-lightlime-question.svg')]">
                            How do you handle user feedback?
                        </h4>
                        <!-- FAQ Header Block -->
                        <!-- FAQ Body -->
                        <div class="ml-10 text-[#0C0C0C]">
                            <p>
                                We value client feedback and work closely with you to
                                make sure user happy with the final design. We offer a
                                specific number of revisions.
                            </p>
                            <img src="assets/img/SocailMediaMarketing.jpg" alt="Social Media Marketing" class="mt-4 rounded-lg w-full h-48 object-cover" />
                        </div>
                        <!-- FAQ Body -->
                    </li>
                    <!-- FAQ Item -->
                    <!-- FAQ Item -->
                    <li class="jos flex flex-col gap-y-4">
                        <!-- FAQ Header Block -->
                        <h4 class="relative pl-10 before:absolute before:left-0 before:top-1 before:h-[30px] before:w-[30px] before:bg-[url('assets/img/icons/icon-lightlime-question.svg')]">
                            Can we see samples of your work?
                        </h4>
                        <!-- FAQ Header Block -->
                        <!-- FAQ Body -->
                        <div class="ml-10 text-[#0C0C0C]">
                            <p>
                                Yes, we're proud to showcase a portfolio of our previous
                                projects. You can find examples of our work on our
                                website or view our portfolio.
                            </p>
                            <img src="assets/img/LeadGeneration.jpg" alt="Lead Generation Services" class="mt-4 rounded-lg w-full h-48 object-cover" />
                        </div>
                        <!-- FAQ Body -->
                    </li>
                    <!-- FAQ Item -->
                </ul>
                <!-- FAQ List -->
            </div>
            <!-- FAQ Area -->
        </div>
        <!-- Section Container -->
    </div>
    <!-- Section Space -->
</section>
<!-- ...::: FAQ Section End :::... -->
</main>
<!--  Main Wrapper End -->

<?php include './partials/layouts/layoutBottom.php' ?>