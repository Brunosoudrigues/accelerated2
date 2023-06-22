

<?php
$this->layout("_theme");

?>



<!-- listagem dos produto s -->
<article class="row">

   
        <!-- container produtos -->
        <section class="container produtos"> <!-- produtos -->
        

        
<?php 

foreach($products as $product){
    
?>

 <a href="#" class="produtos-container col-md-3">
          <!-- imagem do produto -->
          <img src="./assets/web/images/volante pulse.jpg" class="img-fluid" alt="Volante gm">

          <!-- itens do produto -->
          <article class="produtos-itens">
            <!-- title produto -->
            <h2><?= $product->name; ?></h2>
  
            
          </article>
          <!-- end itens do produto -->
</section>
        </a>
        <!-- end produtos -->
     
       

  <!-- end itens do produto -->
</a>
<?php
}
?>
  </article>
