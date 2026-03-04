<div id="contact" class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-5 bg-dark p-5 text-white d-flex flex-column justify-content-center">
                        <h3 class="fw-bold mb-4">Get in Touch</h3>
                        <p class="mb-5 opacity-75">Have a question about Laravel or want to collaborate? Feel free to
                            drop a message!</p>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-geo-alt-fill me-3 fs-4"></i>
                            <span>Laayoune, Morocco</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-fill me-3 fs-4"></i>
                            <span>hassanaitlahcen96@gmail.com</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-linkedin me-3 fs-4"></i>
                            <span>linkedin.com/in/yourname</span>
                        </div>
                    </div>

                    <div class="col-md-7 p-5 bg-white">
                        <h3 class="fw-bold mb-4 text-dark">Send a Message</h3>
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Your Name</label>
                                    <input type="text" name="name"
                                        class="form-control bg-light border-0 py-3 px-4 rounded-3"
                                        placeholder="John Doe" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Email Address</label>
                                    <input type="email" name="email"
                                        class="form-control bg-light border-0 py-3 px-4 rounded-3"
                                        placeholder="john@example.com" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Subject</label>
                                <input type="text" name="subject"
                                    class="form-control bg-light border-0 py-3 px-4 rounded-3"
                                    placeholder="How can I help you?">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Message</label>
                                <textarea name="message" class="form-control bg-light border-0 py-3 px-4 rounded-3" rows="4"
                                    placeholder="Write your message here..." required></textarea>
                            </div>
                            <button type="submit"
                                class="btn btn-dark btn-lg w-100 shadow-sm py-3 fw-bold">
                                Send Message <i class="bi bi-send-fill ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
