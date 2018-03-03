<section>
    <header>
        Dear Mba Nanda & Team QT,
        <br>
    </header>
    
    <div>
	<?php foreach($data as $data_email){ ?>
		<p>
		<?php echo $description; ?>
		</p>
	<?php } ?> 
    </div>
    
    <footer>
    Atas perhatian dan kerjasamanya saya ucapkan terima kasih.
    <br>
    Regards,
    <br>
    <?php echo $this->session->userdata('USERNAME') ;  ?>
    </footer>
</section>



