<div id="quoteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-close-btn">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class = "get-a-quote-container">
                    <div class = "get-a-quote-wrapper">
                        <div class = "quote-left">
                            <h2>Get a quote</h2>
                            <p>Select the main category below and fill in the details</p>
                            <button class = "type-of-services active" data-name="Relocation Services">Relocation Services</button>
                            <button class = "type-of-services" data-name="Freight Services">Freight Services</button>
                            <button class = "type-of-services" data-name="Other Services">Other Services</button>
                        </div>
                        <div class = "quote-right">
                            <div id="quote-title">
                                <h2>Relocation Services</h2>
                            </div>
                            <div class = "quote-form">
                                <?php echo do_shortcode('[contact-form-7 id="180" title="contact-form-7"]');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>