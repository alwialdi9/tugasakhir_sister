<?php $this->load->view('templates/header') ?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            
    </nav>   
    <!-- /. NAV TOP  --> 
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                   <h2>Halaman Tambah Soal</h2>                          
               </div>
           </div>
           <!-- /. ROW  -->
           <hr />
           <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tulis Soal
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form role="form" action="<?php echo base_url(); ?>soal/insert" method="POST" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label>Soal</label>
										
                                        <textarea class="form-control" rows="3" name="soal" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban A</label>
                                        <input class="form-control" name="a" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban B</label>
                                        <input class="form-control" name="b" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban C</label>
                                        <input class="form-control" name="c" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Jawaban D</label>
                                        <input class="form-control" name="d" required/>
                                    </div>
    
                                    <div class="form-group">
                                        <label>-- Pilih Jawaban --</label>
                                        <select class="form-control" name="kunci">
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                            <option>E</option>
                                        </select>
                                        <?php
                                            if(isset($_POST['submit'])){
                                            $pilihan=$_POST["kunci"];
                                            $id_soal=$_POST["id"];
                                            $score=0;
                                            $benar=1;
                                            $salah=0;
                                            $kosong=0;
                                            for ($i=0;$i<$jumlah;$i++){
                                            //id nomor soal
                                            $nomor=$id_soal[$i];
                                            //jika user tidak memilih jawaban
                                            if (empty($pilihan[$nomor])){
                                            $kosong++;
                                            }else{
                                            //jawaban dari user
                                            $jawaban=$pilihan[$nomor];
                                            //cocokan jawaban user dengan jawaban di database
                                            if($cek){
                                            //jika jawaban cocok (benar)
                                            $benar++;
                                            }else{
                                            //jika salah
                                            $salah++;
                                            }}
                                            $score = $benar*5;
                                            }}
                                            ?>

                                    </div>
                                    <div class="form-group">
                                        <label>-- Status --</label>
                                        <select class="form-control" name="status">
                                            <option>tampil</option>
                                            <option>tidak</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" name="file_upload" />
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a class="btn btn-default" href="<?php echo base_url();?>soal">Batal</a>
                                    </div>
                            </div>
                            
                        </form>
                    </div>
        </div>
    </div>
</div>
<script src="asset/js/config.js"></script>
<!-- End Form Elements -->
</div>
</div>
<!-- /. ROW  -->
<!-- /. ROW  -->
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<?php $this->load->view('templates/footer') ?>
</body>
</html>
