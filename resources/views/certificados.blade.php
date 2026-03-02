<section id="certificados" class="container-fluid">
  <div class="container wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">
    <h1>Certificados
      <div class="line-services mb-4 tex" style="margin-left: auto; margin-right: auto; margin-top: 10px;">
        <div class="mini-circle"></div>
      </div>
    </h1>

    <div class="tab_content wow zoomIn" id="proyectos">
      <?php for ($i=1; $i < 16 ; $i++) { ?>
        <div class="each-certificate">
          <a href="{{ url('img/certificates/'.$i.'.png') }}" class="fresco" data-fresco-caption="" data-fresco-group="proyectos" data-fresco-group-options="ui: 'inside'">
            <img class="img-fluid" src="<?= url('img/certificates/'.$i.'.png') ?>" alt="">
          </a>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</section>
