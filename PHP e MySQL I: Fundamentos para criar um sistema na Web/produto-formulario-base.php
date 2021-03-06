
<tr>
		<td>Nome</td><td><input class="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
	</tr>
	<tr>
		<td>Preço</td> <td><input class="form-control" type="number" name="preco" value="<?=$produto->getPreco()?>"></td>
	</tr>
	<tr>
		<td>Descrição</td> <td><textarea class="form-control" name="descricao"><?=$produto->getdescricao()?></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="checkbox" name="usado" value="true" <?=$produto->getUsado()?>> Usado</td>
	</tr>
	<tr>
		<td>Categoria</td> 
		<td>
		<select name="categoria_id" class="form-control">
		<?php 
		foreach ($categorias  as $categoria) : 
			$categoriaVerifica = $produto->getCategoria()->getId() == $categoria->getId();
			$selecao = $categoriaVerifica ? "selected='selected'" : "";	
		?>
			<option value="<?=$categoria->getId()?>" <?=$selecao?> >
				<?=$categoria->getNome()?>		
			</option>
		<?php endforeach ?>
		</select>
		</td>
</tr>
<tr>
    <td>Tipo do produto</td>
    <td>
        <select name="tipoProduto" class="form-control">
            <?php
            $tipos = array("Livro Fisico", "Ebook");
            foreach($tipos as $tipo) : 
            	$tipo = str_replace(" ", "", $tipo);
                $esseEhOTipo = get_class($produto) == $tipo;
                $selecaoTipo = $esseEhOTipo ? "selected='selected'" : "";
            ?>
                	<?php if ($tipo == "LivroFisico"): ?>
                    	<optgroup label="Livros">
                    <?php endif ?>
					<option value="<?=$tipo?>" <?=$selecaoTipo?>>
                    	<?=$tipo?>
                    </option>
                    <?php if ($tipo == "Ebook"): ?>
                    	</optgroup>
                    <?php endif ?> 
            <?php
            endforeach 
            ?>
        </select>
    </td>
</tr>
<tr>
    <td>ISBN (caso seja um Livro)</td>
    <td>
        <input type="text" name="isbn" class="form-control" 
            value="<?php if ($produto->temIsbn()) { echo $produto->getIsbn(); } ?>" >
    </td>
</tr>
<tr>
    <td>WaterMark (caso seja um Ebook)</td>
    <td>
        <input type="text" class="form-control" name="waterMark" 
            value="<?php if ($produto->temWaterMark()) { echo $produto->getWaterMark(); } ?>" />
    </td>
</tr>
<tr>
    <td>Taxa de Impressão (caso seja um Livro Físico)</td>
    <td>
        <input type="text" class="form-control" name="taxaImpressao" 
            value="<?php if ($produto->temTaxaImpressao()) { echo $produto->getTaxaImpressao(); } ?>" />
    </td>
</tr>