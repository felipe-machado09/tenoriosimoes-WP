jQuery(document).ready(function($) {

  function updatePorcentagem(id, value) {
    document.getElementById('porcentagem' + id).textContent = value + '%';
    document.getElementById('progress' + id).style.width = value + '%';
  }

  $('#galleria').show(); // Exibe o contêiner da galeria
  $('#galleria-plantas').show(); // Exibe o contêiner da galeria
  $('#galleria-empreendimento').show(); // Exibe o contêiner da galeria
  $('#galleria-bairro').show(); // Exibe o contêiner da galeria
  $('#galleria-estagio').show(); // Exibe o contêiner da galeria
  Galleria.loadTheme("https://cdnjs.cloudflare.com/ajax/libs/galleria/1.6.1/themes/classic/galleria.classic.min.js");
  Galleria.run('#galleria', {
    height: parseInt($('#galleria').css('height')),
    wait: true,
    lightbox: true

   });
   Galleria.run('#galleria-plantas', {
    height: parseInt($('#galleria-plantas').css('height')),
    wait: true,
    lightbox: true

   });
   Galleria.run('#galleria-empreendimento', {
    height: parseInt($('#galleria-empreendimento').css('height')),
    wait: true,
    lightbox: true

   });
   Galleria.run('#galleria-bairro', {
    height: parseInt($('#galleria-bairro').css('height')),
    wait: true,
    lightbox: true

   });
   Galleria.run('#galleria-estagio', {
    height: parseInt($('#galleria-estagio').css('height')),
    wait: true,
    lightbox: true

   });




});