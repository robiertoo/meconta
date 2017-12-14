$(function($) {
  $("div.frase img").click(function() {
    var id = $(this).parent("div.frase").attr("lang");
    var tipo = $(this).attr("alt");
    var votos =  $("div[lang="+id+"] span."+tipo+" span.valor");
    var status = $("div[lang="+id+"] div.status");
    $.post("votar.php", {id: id, tipo: tipo}, function(resposta) {
      if (resposta) 
      {
        alert(resposta);
      } 
      else 
      {
        
        votos.html(parseInt(votos.html()) + 1);
        alert("Obrigado por votar!");
      }
    });
  }); 
});

$(function($) {
  $("div.nois img").click(function() {
    var id1 = $(this).parent("div.nois").attr("lang");
    var tipo1 = $(this).attr("alt");
    var votos1 =  $("div[lang="+id1+"] span."+tipo1+" span.valor");
    var status1 = $("div[lang="+id1+"] div.status1");
    
    $.post("denuncia.php", {id1: id1, tipo1: tipo1}, function(resposta) {
      if (resposta) 
      {
        alert(resposta);
      } 
      else 
      {
        alert("Obrigado por denunciar!");
      }
    });
  }); 
});

$(window).load(function(){
  $('#myModal').modal('show');
}
);
$(function () {
  $('.dropdown-toggle').dropdown();
}); 