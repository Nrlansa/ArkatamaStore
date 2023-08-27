<div class="footer-section section bg-dark ">
        <div class="container">
            
            <div class="row">
                <div class="col">

                    <!-- Footer Top Start -->
                    <div class="footer-top section pt-80 pb-50">
                        <div class="row">

                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">

                                <img class="footer-logo" src="{{ url('public') }}/img/Logoarkatama.png" alt="logo" width="100px" height="100px">
                                <p>PT Arkatama Multi Solusindo merupakan sebuah perusahaan yang memiliki pengalaman di bidang jasa konsultan IT dan Pengembangan Aplikasi. 
                                    Arkatama siap mendampingi Digital Transformation Indonesia.</p>

                            </div>

                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-2 col-md-3 col-12 mb-40">

                                <h4 class="widget-title"></h4>
                            </div>

                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-2 col-md-3 col-12 mb-40">

                                <h4 class="widget-title">Kategori</h4>

                                <ul>
                                    @foreach ($list_kategori as $kategori)
                                    <li><a href="#">{{ $kategori->nama }}</a></li>
                                    @endforeach
                                   
                                </ul>  

                            </div>

                            <!-- Footer Widget -->
                            <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">

                                <h4 class="widget-title">Contact Us</h4>

                                <ul>
                                    <li><span>MSIB:</span> +6285158119267</li>
                                    <li><span>Email:</span> info@arkatama.id</li>
                                    <li><span>Alamat:</span> Perumahan Joyoagung Greenland No. B4-B5 Tlogomas, Malang</li>
                                </ul>  

                            </div>

                        </div>
                    </div><!-- Footer Top End -->
                    
                    <!-- Footer Bottom Start -->
                    <div class="footer-bottom section text-center">
                        <p><a href="https://github.com/Nrlansa">&copy; Copyright <strong>Nurul Annisa</strong>.</a></p>
                    </div><!-- Footer Bottom End -->

                </div>
            </div>
            
        </div>
    </div>