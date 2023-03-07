 <!-- Header-->
 <header class="bg-dark py-5" id="main-header">
    <div class="container h-100 d-flex align-items-end justify-content-center w-100">
        <div class="text-center text-white w-100">
        <style>body {font-family: Helvetica, sans-serif;}</style>
            <h1 class="display-4 fw-bolder mx-5"><?php echo $_settings->info('name') ?></h1>
            <div class="col-auto mt-2">
                <div>
                <p class="text-dark">
                    Register <i class="fa fa-angle-right"style="color: dimgray;"></i> 
                    Browse <i class="fa fa-angle-right"style="color: dimgray;"></i> 
                    Add to Cart <i class="fa fa-angle-right"style="color: dimgray;"></i> 
                    Deliver</p>
                <br><br>
                <div><a class="btn btn-lg" href="./?p=products" style="background-image:linear-gradient( 135deg, #72EDF2 10%, #5151E5 100%);outline:0;border:0;">Shop Now</a></div>
            </div>
        </div>
    </div>
</header>
<!-- Section-->
            <style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 150px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/4 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}


.active {
  border-bottom: 4px solid #C3F7FC;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.7s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
.navbar-bg-color{
    background-image: radial-gradient( circle 588px at 31.7% 40.2%,  rgba(225,200,239,1) 21.4%, rgba(163,225,233,1) 57.1% );
}
</style>
</div>
</head>
<body>


<div class="shadow" style="height:9rem;width:100%;background-color: #8EC5FC;
background-image: linear-gradient(125deg, #8EC5FC 0%, #c3f7fc 24%, #ffffff 49%, #c3f7fc 75%, #8ec5fc 100%);
">
    <div class="slideshow-container">
        <div class="mySlides fade">
          <div class="numbertext"></div>
           <img src="sample image slide\register img.png" style="width:100%;padding-top: 3.9rem;">
          <div class="text"></div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext"></div>
          <img src="sample image slide\download.png" style="width:100%;;padding-top: 1rem;">
          <div class="text"></div>
        </div>

        <div class="mySlides fade">
          <div class="numbertext"></div>
          <img src="sample image slide\honda-motocycle-logo.jpg" style="width:100%;;padding-top: 1rem;">
          <div class="text"></div>
        </div>
        <div class="mySlides fade">
          <div class="numbertext"></div>
          <img src="sample image slide\download.png" style="width:100%;;padding-top: 1rem;">
          <div class="text"></div>
        </div>
    </div>
</div>


<div style="text-align:center;">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
</div>

<section class="py-5" style="background-color: #FBAB7E;
background-image: linear-gradient(7deg, #FBAB7E 0%, #F7CE68 22%, #97e084 41%, #ffffff 53%, #28cff1 75%, #e3e6a4 87%);
">
    <div class="container px-4 px-lg-5 mt-3">
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-xl-4">
            <?php 
                $products = $conn->query("SELECT p.*,b.name as brand, c.category FROM `product_list` p inner join brand_list b on p.brand_id = b.id inner join `categories` c on p.category_id = c.id where p.delete_flag = 0 and p.status = 1 order by RAND() limit 4");
                while($row= $products->fetch_assoc()):
            ?>
                <a class="col px-2 py-2 text-decoration-none text-dark product-item" href ="./?p=products/view_product&id=<?= $row['id'] ?>">
                    <div  class="card rounded-0 shadow">
                        <div class="product-img-holder overflow-hidden position-relative">
                            <img src="<?= validate_image($row['image_path']) ?>" alt="Product Image" class="img-top"/>
                            <span class="position-absolute price-tag rounded-pill bg-gradient-primary text-light px-3">
                                <i class="fa fa-tags"></i> <b>&#8369;<?= number_format($row['price'],2) ?></b>
                            </span>
                        </div>
                        <div style="background-image: linear-gradient( 135deg, #90F7EC 10%, #32CCBC 100%);" class="card-body border-top">
                            <h4 class="card-title my-0"><b><?= $row['name'] ?></b></h4><br>
                            <small class="text-muted"><?= $row['brand'] ?></small><br>
                            <small class="text-muted"><?= $row['category'] ?></small>
                            <p class="m-0 truncate-5"><?= strip_tags(html_entity_decode($row['description'])) ?></p>
                        </div>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<script>
    
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

    $(function(){
        $('#search').on('input',function(){
            var _search = $(this).val().toLowerCase().trim()
            $('#service_list .item').each(function(){
                var _text = $(this).text().toLowerCase().trim()
                    _text = _text.replace(/\s+/g,' ')
                    console.log(_text)
                if((_text).includes(_search) == true){
                    $(this).toggle(true)
                }else{
                    $(this).toggle(false)
                }
            })
            if( $('#service_list .item:visible').length > 0){
                $('#noResult').hide('slow')
            }else{
                $('#noResult').show('slow')
            }
        })
        $('#service_list .item').hover(function(){
            $(this).find('.callout').addClass('shadow')
        })
        $('#service_list .view_service').click(function(){
            uni_modal("Service Details","view_service.php?id="+$(this).attr('data-id'),'mid-large')
        })
        $('#send_request').click(function(){
            uni_modal("Fill the Service Request Form","send_request.php",'large')
        })

    })
    $(document).scroll(function() { 
        $('#topNavBar').removeClass('bg-transparent navbar-dark')
        if($(window).scrollTop() === 0) {
           $('#topNavBar').addClass('navbar-dark navbar-bg-color')
        }else{
           $('#topNavBar').addClass('navbar-dark navbar-bg-color')
        }
    });
    $(function(){
        $(document).trigger('scroll')
    })
</script>