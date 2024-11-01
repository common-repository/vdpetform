<div class="wrap">
    <div class="notify">
        <div class="notify__content">
            <i class="fa fa-file-text-o" aria-hidden="true"></i> Shortcode gekopieerd
        </div>
    </div>
    <h1 class="pdy-10"> Vergelijkdirect.com | Wordpress plugin<button id="vd-open-modal" class="vd-button vd-float-right">Voeg vergelijker toe</button></h1>
    <hr>
    <div class="vdpetform-admin-overview">
        <div class="vdpetform-admin-overview__text-block-one">
            <h1>Hoe werkt de plugin?</h1>
            <p>Je maakt een vergelijker aan door op de knop rechts bovenin te drukken: 'Voeg vergelijker toe'. Vervolgens opent er een popup. Daar kun je je eigen vergelijker maken. Deze kan je ook aanpassen zoals je wilt. Zodra je tevreden bent met de kleuren kan je een bepaalde code kopiëren. Dit wordt ook wel een shortcode genoemd, zoals deze: [vd_form id="108" width="300px" type="vertical" align="left/right"]. Deze shortcode heeft een aantal opties die je zelf kunt aanpassen.
                <ul>
                    <li><b>- Width (100px / auto / 100%) </b><br> De maximale breedte van de vergelijker (Werkt alleen op een type verticaal).</li>
                    <li><b>- Type (vertical / horizontal) </b><br> Hoe de vergelijker op de pagina staat.</li>
                    <li><b>- Align (left / right) </b><br> Zorgt ervoor dat de tekst om de vergelijker loopt.</li>
                </ul>
            </p>
        </div>
        <div class="vdpetform-admin-overview__text-block-two">
            <h1>Hulp nodig?</h1>
            <p>Hulp nodig hebt of een foutje gevonden? Je kunt mailen naar <b> vincent@vergelijkdirect.com </b></p>
        </div>
        <div class="vdpetform-admin-overview__table">
            <table>
                <tr>
                    <th>Vergelijker naam</th>
                    <th>Beschrijving</th>
                    <th>Shortcode</th>
                    <th>Acties</th>
                </tr>
				<?php 
          	 		$args = array( 'post_type' => 'vergelijkdirect-form', 'posts_per_page' => 10 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						?>
						<tr>
							<td><a href="admin.php?page=vergelijkdirect_form&type=edit&form=<?= get_the_ID(); ?>" class="name"><?= the_title(); ?></a></td>
							<td><?php echo the_content(); ?></td>
							<td>
								<code data-clipboard-text="[vd_form id=&quot;<?= get_the_ID(); ?>&quot; width=&quot;300px&quot; type=&quot;vertical&quot;]" class="copy el-tooltip" title="Click to copy 									shortcode" aria-describedby="el-tooltip-4651" tabindex="0"><i class="fa fa-file-text-o" aria-hidden="true"></i> [vd_form id=&quot;<?= get_the_ID(); ?>&quot; 										   width=&quot;300px&quot; type=&quot;vertical&quot;]
								</code>
							</td>
							<td>
								<p>
									<a class="edit" href="admin.php?page=vergelijkdirect_form&type=edit&form=<?= get_the_ID(); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 													Aanpassen
									</a>
								</p>
                        		<p>
									<a class="remove" href="admin.php?page=vergelijkdirect_form&type=delete&form=<?= get_the_ID(); ?>" onclick="if (!confirm('Weet je zeker dat je <?= the_title(); ?> 										wilt verwijderen?')) return false;"><i class="fa fa-times" aria-hidden="true"></i>
										Verwijderen</a>
								</p>

							</td>
						</tr>
						<?php
					endwhile;
				?>
            </table>
        </div>
    </div>
</div>

<div id="myModal" class="vd-modal">
    <div class="vd-modal-content">
        <div class="vd-modal-header">
            <span class="vd-close">&times;</span>
            <h2 class="vd-title">Voeg vergelijker toe</h2>
        </div>
        <div class="vd-modal-body">
            <form method="POST">
            <div class="vd-admin-form">
                <label class="vd-admin-form__label" for="name">Naam</label>
                <input type="text" id="name" name="name" required class="form-control">
                <label class="vd-admin-form__label">Kies type vergelijker</label>
                <select required="" aria-required="true" aria-invalid="false" name="type" id="leeftijd" />
                    <option disabled="disabled" value="" name="type" selected="">Selecteer</option>
                    <option value="1">Dierenverzekering</option>
                    <option value="2">Fietsverzekering</option>
                    <option value="3">Motorverzekering</option>
                </select>
                <label class="vd-admin-form__label" for="desc">Omschrijving (bijvoorbeeld positie op je site)</label>
                <textarea id="desc" name="description" required cols="80" rows="10"></textarea><br>
                <input style="background: #ea1360; color: #fff;border:none;" name="create_form" type="submit" class="vd-button" value="Voeg vergelijker toe"/>
            </div>
        </form>
    </div>
</div>