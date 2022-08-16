<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= get_home_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </div><!-- End .container -->

    </nav>
    <div class="page-header">
        <div class="container">
            <h1>Contact Us</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="container">
        <div id="map"></div><!-- End #map -->

        <div class="row">
            <?php
            $contact = get_sub_field('contact');
            ?>
            <div class="col-md-8">
                <h2 class="light-title"><?php echo $contact['title']; ?></h2>
                <?php echo do_shortcode("[contact-form-7 id='" . $contact['form'] . "']") ?>

            </div><!-- End .col-md-8 -->
            <?php $contact = get_field('contact', 'option') ?>
            <?php $social = get_field('social', 'option') ?>
            <div class="col-md-4">
                <h2 class="light-title">Contact <strong>Details</strong></h2>

                <div class="contact-info">
                    <div>
                        <i class="icon-phone"></i>
                        <p>
                            <a href="tel:<?= $contact['contact_page_number'] ?>"><?= $contact['contact_page_number'] ?></a>
                        </p>
                        <!--                        <p><a href="tel:">0201 203 2032</a></p>-->
                    </div>
                    <div>
                        <i class="icon-mobile"></i>
                        <p>
                            <a href="tel:<?= $contact['contact_page_phone_number'] ?>"><?= $contact['contact_page_phone_number'] ?></a>
                        </p>
                        <!--                        <p><a href="tel:">302-123-3928</a></p>-->
                    </div>
                    <div>
                        <i class="icon-mail-alt"></i>
                        <p>
                            <a href="mailto:<?= $contact['contact_page_email'] ?>"><?= $contact['contact_page_email'] ?></a>
                        </p>
                        <!--                        <p><a href="mailto:#">porto@portotemplate.com</a></p>-->
                    </div>
                    <div>
                        <i class="icon-skype"></i>
                        <p><?= $contact['contact_page_skype'] ?></p>
                        <!--                        <p>porto_template</p>-->
                    </div>
                </div><!-- End .contact-info -->
            </div><!-- End .col-md-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-8"></div><!-- margin -->
</main><!-- End .main -->
