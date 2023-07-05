<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$conheca_empreendimento = get_field('conheca_o_empreendimento');

$banner_imagem_fundo = get_field('banner_imagem_fundo');
$banner_bairro = get_field('banner_bairro');
$banner_quantidade_de_quartos = get_field('banner_quantidade_de_quartos');
$banner_renda_familiar = get_field('banner_renda_familiar');
$banner_imagem_pequena = get_field('banner_imagem_pequena');

//repetidor 
$conheca_os_diferenciais = get_field('conheca_os_diferenciais');

$gostei_do_empreendimento_link = get_field('gostei_do_empreendimento_link');

//repetidor
$o_apartemento_detalhes = get_field('o_apartemento_detalhes');

$galeria_apartamento = get_field('galeria_apartamento');
$galeria_plantas = get_field('galeria_plantas');
$galeria_empreendimento = get_field('galeria_empreendimento');
$galeria_bairro = get_field('galeria_bairro');
$gostei_do_empreendimento_2 = get_field('gostei_do_empreendimento_2');
$conheca_o_bairro_texto = get_field('conheca_o_bairro_texto');
$conheca_o_bairro_imagem = get_field('conheca_o_bairro_imagem');
$como_chegar_endereco = get_field('como_chegar_endereco');
$como_chegar_mapa = get_field('como_chegar_mapa');
$estagio_da_obra_fundacao = get_field('estagio_da_obra_fundacao');
$estagio_da_obra_estrutura = get_field('estagio_da_obra_estrutura');
$estagio_da_obra_alvenaria = get_field('estagio_da_obra_alvenaria');
$estagio_da_obra_fachada = get_field('estagio_da_obra_fachada');
$estagio_da_obra_acabamento = get_field('estagio_da_obra_acabamento');
$estagio_da_obra_galeria = get_field('estagio_da_obra_galeria');
$formulario_contato_texto = get_field('formulario_de_contato_texto');
$formulario_de_contato = get_field('formulario_de_contato');

?>




<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header ">
	<div class="banner-container" style="background-image: url(<?php echo $banner_imagem_fundo; ?>) ">
		<div class="banner-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 esquerda">
						<div class="texto">
							<h1 class="txt-branca"><?php echo $post->post_title ?></h1>
							<p class="txt-branca"><?php echo $banner_bairro ?></p>
							<p class="txt-branca"> <?php echo $banner_quantidade_de_quartos ?> quartos</p>
							<p class="txt-branca">Renda familiar: A partir de R$ <?php echo $banner_renda_familiar ?></p>
						</div>
					</div>
					<div class="col-md-6 direita">
						<div class="img-pequena">
							<img src="<?php echo $banner_imagem_pequena; ?>" alt="">
						</div>
					</div>
				</div>
		</div>
	</div>

	</header><!-- .entry-header -->

	<div class="entry-content bg-cinza section-container" style="margin-top: 0;">


	<div class="container">
		<div class="conheca-empreendimento ">
			<h2>Conheça o Empreendimento</h2>
			<p>
				<?php if(isset($conheca_empreendimento)): ?>
				<?php echo $conheca_empreendimento; ?>
				<?php endif; ?>
			</p>
		</div>
		</div>
	</div>


	<div class="diferenciais ">
		<div class="container">
			<h2>Diferenciais</h2>
			<div class="row">
				<?php if( have_rows('conheca_os_diferenciais') ): ?>
				<?php while( have_rows('conheca_os_diferenciais') ): the_row(); 
						$icone = get_sub_field('diferencial_imagem');
						$titulo = get_sub_field('diferencial_titulo');
						$texto = get_sub_field('diferencial_texto');
						?>
				<div class="col-md-3">
					<div class="diferencial">
						<div class="icone">
							<img src="<?php echo $icone; ?>" alt="<?php echo $titulo ?>" />
						</div>
						<div class="texto">
							<h3><?php echo $titulo; ?></h3>
							<p><?php echo $texto; ?></p>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="gostei-do-empreendimento">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="texto">
						<p>
							<?php if(isset($gostei_do_empreendimento_link)): ?>
							<a href="<?php echo $gostei_do_empreendimento_link; ?>" class="btn ">Gostei do Empreendimento</a>
							<?php endif; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="o-apartamento">
		<div class="container">

			<div class="texto">
				<h2>O Apartamento</h2>
				<div class="row">
					<?php if( have_rows('o_apartemento_detalhes') ): ?>
					<?php while( have_rows('o_apartemento_detalhes') ): the_row(); 
								// vars
								$imagem = get_sub_field('o_apartamento_imagem');
								$titulo = get_sub_field('o_apartamento_titulo');
								$texto = get_sub_field('o_apartamento_texto');
								?>
					<div class="detalhe col-md-3">
						<div class="icone">
							<img src="<?php echo $imagem; ?>" alt="<?php echo $titulo ?>" />
						</div>
						<div class="texto">
							<h3><?php echo $titulo; ?></h3>
							<p><?php echo $texto; ?></p>
						</div>

					</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="galeria-fotos container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="titulo">
						<h2>Galeria de Fotos</h2>
					</div>
				</div>



				<div class="col-md-6">
					<h2 class="titulo2">Apartamento</h2>
					<div id="galleria">
						<?php
								$images = get_field('galeria_apartamento');
								if( $images ): ?>
						<?php foreach( $images as $index => $image ): ?>
						<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-6">
					<h2 class="titulo2">Plantas</h2>
					<div id="galleria-plantas">
						<?php
							$images = get_field('galeria_plantas');
							if( $images ): ?>
						<?php foreach( $images as $index => $image ): ?>
						<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endforeach; ?>
						<?php endif; ?>
						<!-- Adicione mais imagens conforme necessário -->
					</div>
				</div>

				<div class="col-md-6">
					<h2 class="titulo2">empreendimento</h2>
					<div id="galleria-empreendimento">
						<?php
									$images = get_field('galeria_empreendimento');
									if( $images ): ?>
						<?php foreach( $images as $index => $image ): ?>
						<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-6">
					<h2 class="titulo2">Bairro</h2>
					<div id="galleria-bairro">
						<?php
								$images = get_field('galeria_bairro');
								if( $images ): ?>
						<?php foreach( $images as $index => $image ): ?>

						<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />


						<?php endforeach; ?>
						<?php endif; ?>
						<!-- Adicione mais imagens conforme necessário -->
					</div>
				</div>

			</div>
		</div>
	</div>



	<div class="gostei-do-empreendimento ">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="texto">
						<p>
							<?php if(isset($gostei_do_empreendimento_2)): ?>
							<a href="<?php echo $gostei_do_empreendimento_2; ?>" class="btn ">Gostei do Empreendimento</a>
							<?php endif; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="conheca_o_bairro section-container">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="titulo">
						<h2> CONHEÇA O BAIRRO </h2>
					</div>
					<div class="texto">
						<p><?php echo $conheca_o_bairro_texto  ?></p>

					</div>
				</div>
				<div class="col-md-12">
					<div class="mapa">

						<img src="<?php echo $conheca_o_bairro_imagem; ?>" alt="conheca o bairro imagem" />

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="como_chegar bg-laranja">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="titulo">
						<h2 class="txt-branca"> COMO CHEGAR NO <br>
							<span><?php echo $post->post_title ?></span>
							<div class="icone">
								<i class="fas fa-chevron-right"></i>
							</div>

						</h2>

					</div>
					<div class="texto">
						<p class="txt-branca"> <span class="txt-marrom"> <i class="fas fa-map-marker-alt"></i></span>
							<?php echo $como_chegar_endereco  ?></p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mapa">

						<p><?php echo $como_chegar_mapa  ?></p>



					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="estagio_obra">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="titulo">
						<h2>ESTÁGIO DA OBRA</h2>
					</div>
				</div>
				<div class="col-md-5">
					<div class="custom-progress-container">
						<h4>Fundação - <span id="porcentagem1"><?php echo $estagio_da_obra_fundacao?>%</span></h4>
						<div class="custom-progress">
							<div class="custom-progress-bar">
								<div class="custom-progress-filled" style="width: <?php echo $estagio_da_obra_fundacao?>%;"
									id="progress1"></div>
							</div>
						</div>

						<h4>Estrutura - <span id="porcentagem2"><?php echo $estagio_da_obra_estrutura?>%</span></h4>
						<div class="custom-progress">
							<div class="custom-progress-bar">
								<div class="custom-progress-filled" style="width: <?php echo $estagio_da_obra_estrutura?>%;"
									id="progress2"></div>
							</div>
						</div>

						<h4>Alvenaria - <span id="porcentagem3"><?php echo $estagio_da_obra_alvenaria?>%</span></h4>
						<div class="custom-progress">
							<div class="custom-progress-bar">
								<div class="custom-progress-filled" style="width: <?php echo $estagio_da_obra_alvenaria?>%;"
									id="progress3"></div>
							</div>
						</div>

						<h4>Fachada - <span id="porcentagem4"><?php echo $estagio_da_obra_fachada?>%</span></h4>
						<div class="custom-progress">
							<div class="custom-progress-bar">
								<div class="custom-progress-filled" style="width: <?php echo $estagio_da_obra_fachada?>%;"
									id="progress4"></div>
							</div>
						</div>

						<h4>Acabamento - <span id="porcentagem5"><?php echo $estagio_da_obra_acabamento?>%</span></h4>
						<div class="custom-progress">
							<div class="custom-progress-bar">
								<div class="custom-progress-filled" style="width: <?php echo $estagio_da_obra_acabamento?>%;"
									id="progress5"></div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-md-7">

					<div class="galeria_estagio">
						<div id="galleria-estagio">
							<?php

								if( $estagio_da_obra_galeria ): ?>
							<?php foreach( $estagio_da_obra_galeria as $index => $image ): ?>
							<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
							<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





	<div class="ficou-interessado bg-cinza">
		<div class="container-fluid">
			<div class="row">
				<div class="container">
					<div class="col-md-12">
						<h2 class="titulo bold">Ficou Interessado nesse empreendimento? </h2>
						<p class="texto"> <?php	echo $formulario_contato_texto ?> </p>
						<div class="formulario">
							<?php echo do_shortcode($formulario_de_contato); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->