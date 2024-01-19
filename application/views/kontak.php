<!-- *****************************************************************************************************************
 CONTACT WRAP
 ***************************************************************************************************************** -->

<div id="contactwrap"></div>

<!-- *****************************************************************************************************************
 CONTACT FORMS
 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">
        <div class="col-lg-8">
            <h4>Kritik dan Saran</h4>
            <?php echo $this->session->userdata('email_sent'); ?>
            <div class="hline"></div>
            <p>Selamat datang di halaman kontak SKKM ITI! Kami sangat senang mendengar dari Anda. Jika Anda memiliki pertanyaan, saran, atau ingin berkolaborasi, jangan ragu untuk menghubungi tim kami. Kami berkomitmen untuk memberikan tanggapan yang cepat dan membantu Anda dengan segala kebutuhan yang Anda miliki. Isi formulir di bawah ini atau gunakan informasi kontak kami untuk terhubung langsung.</p>
            <?php
            $attributes = array('role' => 'form');
            echo form_open('kontak/kirim_pesan', $attributes); ?>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required="">
            </div>
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" name="perihal" value="Kritik dan Saran" class="form-control" id="perihal"
                       readonly="">
            </div>
            <div class="form-group">
                <label for="pesan">Pesan</label>
                <textarea class="form-control" name="pesan" id="pesan" rows="3" required=""></textarea>
            </div>
            <?php echo form_submit('submit', 'Kirim', 'class="btn btn-theme"'); ?>
            <?php echo form_close(); ?>
        </div>
        <! --/col-lg-8 -->

        <div class="col-lg-4">
            <h4>Alamat</h4>
            <div class="hline"></div>
            <p>
                Institut Teknologi Indonesia,<br/>
                55201, Serpong,<br/>
                Serpong, Tangerang Selatan,Banten.<br/>
            </p>
        </div>
    </div>
    <! --/row -->
</div><! --/container -->
