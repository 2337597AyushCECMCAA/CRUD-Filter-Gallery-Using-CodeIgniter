<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Carousel and Image Gallery</title>
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a {
            text-decoration: none !important;
            list-style: none;
        }

        .title {
            margin-top: 50px;
            text-align: center;
            font-family: Arial;
            text-transform: uppercase;
            color: #d63031;
        }

        .title span {
            display: block;
            color: #942c2c;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .container {
            margin: 50px 0;
            padding: 0 30px;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .head {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 25px;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .gallery .col-lg-3 {
            margin: 10px;
        }

        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .gallery p {
            text-align: center;
            margin-top: 5px;
        }

        .alert-danger {
            text-align: center;
        }

        .carousel-gallery {
            margin: 50px 0;
        }

        .swiper-container {
            width: 100%;
            height: auto;
            overflow: hidden; 
        }

        .swiper-wrapper {
            display: flex;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
            box-shadow: 3px 2px 20px 0px rgba(0, 0, 0, .2);
            width: auto;
        }

        .swiper-slide a {
            display: block;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .swiper-slide .image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center center;
        }

        .swiper-slide .overlay {
            width: 100%;
            height: 100%;
            background-color: rgba(20, 20, 20, .8);
            text-align: center;
            opacity: 0;
            transition: all .2s linear;
        }

        .swiper-slide .overlay em {
            color: #fff;
            font-size: 26px;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            display: inline-block;
        }

        .swiper-slide:hover .overlay {
            opacity: 1;
        }

        .swiper-pagination {
            position: relative;
            bottom: auto;
            text-align: center;
            margin-top: 25px;
        }

        .swiper-pagination-bullet {
            transition: all .2s linear;
        }

        .swiper-pagination-bullet:hover {
            opacity: .7;
        }

        .swiper-pagination-bullet-active {
            background-color: #d63031;
            transform: scale(1.1, 1.1);
        }

        .plugins {
            text-align: center;
        }

        .plugins h3 {
            margin: 0;
            padding: 0;
            font-family: Arial;
            text-transform: uppercase;
            color: #111;
        }

        .plugins a {
            display: inline-block;
            font-family: Arial;
            color: #777;
            font-size: 14px;
            margin: 10px;
            transition: all .2s linear;
        }

        .plugins a:hover {
            color: #d63031;
        }

        .filter-controls {
            text-align: center;
            margin-bottom: 20px;
        }

        .filter-controls button.all {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #d63031;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 5px;
        }
        .filter-controls button {
            padding: 10px 20px;
            font-size: 16px;
            border-color: #d63031;
            color: #d63031;
            /* border: none; */
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 5px;
        }

        .filter-controls button:hover {
            background-color: #d63031;
            color:white;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1><span>Responsive</span> Carousel Gallery</h1>
    </div>

    <!-- Carousel Gallery -->
    <div class="carousel-gallery">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php if(!empty($gallery)){ ?> 
                <?php 
                    foreach($gallery as $row){ 
                        $uploadDir = '/codeigniter/uploads/images/'; 
                        $imageURL = $uploadDir.$row["file_name"]; 
                ?>
                <div class="swiper-slide">
                    <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["title"]; ?>">
                        <div class="image" style="background-image: url(<?php echo $imageURL; ?>)">
                            <div class="overlay">
                                <em class="mdi mdi-magnify-plus"></em>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?> 
                <?php }else{ ?>
                    <div class="col-xs-12">
                        <div class="alert alert-danger">No image(s) found...</div>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- #Carousel Gallery -->

    <div class="container">
        <h2>Gallery Images</h2>
        <hr>
        <div class="head">
            <a href="/codeigniter/index.php/manage_gallery/" class="glink" style="background:#942c2c; padding: 5px 20px; color:white; border-radius: 20px;">Manage</a>
        </div>
        <div class="gallery">
            <?php if(!empty($gallery)){ ?> 
            <?php 
                foreach($gallery as $row){ 
                    $uploadDir = '/codeigniter/uploads/images/'; 
                    $imageURL = $uploadDir.$row["file_name"]; 
            ?>
            <div class="col-lg-3">
                <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["title"]; ?>">
                    <img style="width:100%; height:200px;" src="<?php echo $imageURL; ?>" alt="" />
                    <p class="mt-2" style="color:white; background:red; padding: 5px; width:100%;"><?php echo $row["title"]; ?></p>
                </a>
            </div>
            <?php } ?> 
            <?php }else{ ?>
                <div class="col-xs-12">
                    <div class="alert alert-danger">No image(s) found...</div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Filter Gallery -->
    <div class="container filter-gallery">
        <h2>Gallery Images</h2>
        <hr>
        <div class="head">
            <a href="/codeigniter/index.php/manage_gallery/" class="glink" style="background:#942c2c; padding: 5px 20px; color:white; border-radius: 20px;">Manage</a>
        </div>

        <!-- Division Buttons -->
        <div class="filter-controls">
            <button class="btn-filter all" data-division="all">All</button>
            <?php if (!empty($divisions)) : ?>
                <?php foreach($divisions as $division) : ?>
                    <?php if (is_string($division)) : ?>
                        <button class="btn-filter" data-division="<?php echo htmlspecialchars($division); ?>"><?php echo ucfirst(htmlspecialchars($division)); ?></button>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No divisions available.</p>
            <?php endif; ?>
            
        </div>

        <div class="gallery row">
            <?php if(!empty($gallery)){ ?> 
            <?php 
                foreach($gallery as $row){ 
                    $uploadDir = '/codeigniter/uploads/images/'; 
                    $imageURL = $uploadDir.$row["file_name"]; 
            ?>
            <div class="col-lg-3 gallery-item" data-division="<?php echo htmlspecialchars($row['division']); ?>">
                <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo htmlspecialchars($row["title"]); ?>">
                    <img style="width:100%; height:200px;" src="<?php echo $imageURL; ?>" alt="" />
                    <p class="mt-2" style="color:white; background:red; padding: 5px; width:100%;"><?php echo htmlspecialchars($row["title"]); ?></p>
                </a>
            </div>
            <?php } ?> 
            <?php }else{ ?>
                <div class="col-xs-12">
                    <div class="alert alert-danger">No image(s) found...</div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- #Filter Gallery -->

    <!-- Fancybox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize fancybox -->
    <script>
        $("[data-fancybox]").fancybox();
    </script>
    <!-- Initialize Swiper -->
    <script>
        $(function(){
            var swiper = new Swiper('.carousel-gallery .swiper-container', {
                effect: 'slide',
                speed: 900,
                slidesPerView: 5,
                spaceBetween: 20,
                simulateTouch: true,
                loop: true, 
                autoplay: {
                    delay: 5000,
                    stopOnLastSlide: false,
                    disableOnInteraction: false
                },
                pagination: {
                    el: '.carousel-gallery .swiper-pagination',
                    clickable: true
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 5
                    },
                    425: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 15
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 20
                    },
                    1440: {
                        slidesPerView: 5,
                        spaceBetween: 20
                    }
                }
            });
        });
    </script>
    <!-- Filter Gallery Script -->
    <script>
        $(document).ready(function() {
            $('.btn-filter').on('click', function() {
                var selectedDivision = $(this).data('division');

                $('.gallery-item').each(function() {
                    var itemDivision = $(this).data('division');

                    if (selectedDivision === 'all' || itemDivision === selectedDivision) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }   
                });
         });
        });

    </script>
</body>
</html>
