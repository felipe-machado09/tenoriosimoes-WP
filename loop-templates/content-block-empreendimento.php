<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
$status = get_field('status_da_obra', $post->ID) == 'lancamento' ? LANCAMENTO : EM_OBRAS;

?>

<div class="empreendimentos-archive">
		<div class="card-container">
			<p class="card_status"><?php echo $status ?></p>
			<img src="<?php echo get_field('banner_imagem_pequena', $post->ID); ?>" alt="" class="card-img">
			<h3 class="card_title"><?php echo get_the_title($post->ID); ?></h3>
			<p class="card_description"><?php echo exibir_resumo(get_field('conheca_o_empreendimento', $post->ID)); ?></p>
			<a href="<?php echo get_permalink($post->ID); ?>" class="btn card_saiba_mais">SAIBA MAIS</a>
		</div>
</div><!-- .no-results -->