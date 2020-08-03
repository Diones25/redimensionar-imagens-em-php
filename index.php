<?php
    $arquivo = "bg.png";
    $largura = 200;
    $altura = 200;

    list($largura_original, $altura_original) = getimagesize($arquivo);

    $ratio = $largura_original / $altura_original;

    if($largura / $altura  > $ratio){
        $largura = $altura * $ratio;
    }
    else{
        $altura = $largura / $ratio;
    }
    //echo "LARGURA ORIGINAL: ".$largura_original." - ALTURA ORIGINAL: ".$altura_original."<br>";
    //echo "LARGURA ".$largura." - ALTURA: ".$altura;

    $imagem_final = imagecreatetruecolor($largura, $altura);
    $imagem_original = imagecreatefrompng($arquivo);

    imagecopyresampled($imagem_final, $imagem_original, 
    0, 0, 0, 0, 
    $largura, $altura, $largura_original, $altura_original);

    
    imagepng($imagem_final, "mini_bg.png");

    echo "Imagem redimensionada com sucesso!";
?>