<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>

    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="<?= base_url('asset/') ?>css/components/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/') ?>css/components/timepicker.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('asset/') ?>css/components/daterangepicker.css" type="text/css" />

</head>

<body>
    <!-- Content
		============================================= -->
    <section id="content">
        <div class="">

  


            <section id="section-work" class="page-section topmargin-lg">

                <div class="heading-block center">
                    <h2>Data analysis.</h2>
                    <span>ข้อมูลอัพเดตล่าสุดวันที่ <?=conDateTimeFromDb(getLastupdate())?></span>
                </div>

                <div class="container">

                    <!-- Portfolio Items
    ============================================= -->
                    <div id="portfolio" class="portfolio row grid-container no-gutters text-center" data-layout="fitRows">

                        <!-- Portfolio Item: Start -->
                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-media pf-icons">
                            <!-- Grid Inner: Start -->
                            <div class="grid-inner">
                                <!-- Image: Start -->
                                <div class="portfolio-image">
                                    <a href="portfolio-single.html">
                                        <img src="{topic1_image}" alt="Open Imagination">
                                    </a>
                                    <!-- Overlay: Start -->
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic1_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                    <!-- Overlay: End -->
                                </div>
                                <!-- Image: End -->
                                <!-- Decription: Start -->
                                <div class="portfolio-desc">
                                    <h3><a href="{topic1_fullpage}">ประสิทธิผลการผลิตของแผนก Production</a></h3>
                                    <span>หัวข้อที่1</span>
                                </div>
                                <!-- Description: Start -->
                            </div>
                            <!-- Grid Inner: End -->
                        </article>
                        <!-- Portfolio Item: End -->

                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-illustrations">
                            <div class="grid-inner">
                                <div class="portfolio-image">
                                    <a href="portfolio-single.html">
                                        <img src="{topic2_image}" alt="Locked Steel Gate">
                                    </a>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic2_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="{topic2_fullpage}">ปริมาณ NON COMFORM PRODUCT</a></h3>
                                    <span>หัวข้อที่2</span>
                                </div>
                            </div>
                        </article>

                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-graphics pf-uielements">
                            <div class="grid-inner">
                                <div class="portfolio-image">
                                    <a href="#">
                                        <img src="{topic3_image}" alt="Mac Sunglasses">
                                    </a>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic3_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="{topic3_fullpage}">จำนวน PRODUCTION CARD และ ADJUST RERUN</a></h3>
                                    <span>หัวข้อที่3</span>
                                </div>
                            </div>
                        </article>


                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-graphics pf-uielements">
                            <div class="grid-inner">
                                <div class="portfolio-image">
                                    <a href="#">
                                        <img src="{topic4_image}" alt="Mac Sunglasses">
                                    </a>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic4_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="{topic4_fullpage}">มูลค่าของ Variance</a></h3>
                                    <span>หัวข้อที่4</span>
                                </div>
                            </div>
                        </article>



                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-graphics pf-uielements">
                            <div class="grid-inner">
                                <div class="portfolio-image">
                                    <a href="#">
                                        <img src="{topic5_image}" alt="Mac Sunglasses">
                                    </a>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic5_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="{topic5_fullpage}">ปริมาณ % LOSS</a></h3>
                                    <span>หัวข้อที่5</span>
                                </div>
                            </div>
                        </article>



                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-graphics pf-uielements">
                            <div class="grid-inner">
                                <div class="portfolio-image">
                                    <a href="#">
                                        <img src="{topic6_image}" alt="Mac Sunglasses">
                                    </a>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic6_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="{topic6_fullpage}">จำนวน Production Card และจำนวน Work In Process</a></h3>
                                    <span>หัวข้อที่6</span>
                                </div>
                            </div>
                        </article>



                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-graphics pf-uielements">
                            <div class="grid-inner">
                                <div class="portfolio-image">
                                    <a href="#">
                                        <img src="{topic7_image}" alt="Mac Sunglasses">
                                    </a>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic7_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="{topic7_fullpage}">KPI. ควบคุมความเสียหายที่เกิดขึ้นจากการผลิต</a></h3>
                                    <span>หัวข้อที่7</span>
                                </div>
                            </div>
                        </article>




                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-graphics pf-uielements">
                            <div class="grid-inner">
                                <div class="portfolio-image">
                                    <a href="#">
                                        <img src="{topic8_image}" alt="Mac Sunglasses">
                                    </a>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic8_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="{topic8_fullpage}">จำนวน Production Card ที่ End Process ในแต่ละวัน</a></h3>
                                    <span>หัวข้อที่8</span>
                                </div>
                            </div>
                        </article>




                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-graphics pf-uielements">
                            <div class="grid-inner">
                                <div class="portfolio-image">
                                    <a href="#">
                                        <img src="{topic9_image}" alt="Mac Sunglasses">
                                    </a>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic9_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="{topic9_fullpage}">มูลค่า Variance by machine</a></h3>
                                    <span>หัวข้อที่9</span>
                                </div>
                            </div>
                        </article>



                        <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-graphics pf-uielements">
                            <div class="grid-inner">
                                <div class="portfolio-image">
                                    <a href="#">
                                        <img src="{topic10_image}" alt="Mac Sunglasses">
                                    </a>
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                            <a href="{topic10_fullpage}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                        </div>
                                        <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                    </div>
                                </div>
                                <div class="portfolio-desc">
                                    <h3><a href="{topic10_fullpage}">ปริมาณการผลิต by machine</a></h3>
                                    <span>หัวข้อที่10</span>
                                </div>
                            </div>
                        </article>


                    </div><!-- #portfolio end -->

                </div>
            </section>

        </div>
    </section><!-- #content end -->
</body>

</html>




<script>
    $(document).ready(function() {



        // Control การเลือกบริษัท
        $('#upload_company').change(function() {
            if ($(this).val() == "sln") {
                $('#upload_sln').css('display', '');
            } else {
                $('#upload_sln').css('display', 'none');
            }

            if ($(this).val() == "ca") {
                $('#upload_ca').css('display', '');
            } else {
                $('#upload_ca').css('display', 'none');
            }

            if ($(this).val() == "poly") {
                $('#upload_poly').css('display', '');
            } else {
                $('#upload_poly').css('display', 'none');
            }
        });

        $('.component-datepicker.mnth').datepicker({
            autoclose: true,
            minViewMode: 1,
            format: "mm/yyyy"
        });

    });
</script>