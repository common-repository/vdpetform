<div class="wrap vdpetform-admin-edit">
<div class="notify">
        <div class="notify__content">
            <i class="fa fa-file-text-o" aria-hidden="true"></i> Shortcode gekopieerd
        </div>
    </div>
    <div class="vdpetform-admin-edit__block-one">
        <a href="admin.php?page=vergelijkdirect_form&type=all" class="vdpetform-admin-edit__button">Terug naar alle vergelijkers</a>
        <div class="vd-admin__card">
            <h1><?= $data[0]->form_name; ?></h1>
            <p><code data-clipboard-text="[vd_form id=&quot;<?= $data[0]->form_id; ?>&quot; width=&quot;300px&quot; type=&quot;vertical&quot;]" class="copy el-tooltip" title="Click to copy shortcode" aria-describedby="el-tooltip-4651" tabindex="0"><i class="fa fa-file-text-o" aria-hidden="true"></i> [vd_form id=&quot;<?= $data[0]->form_id; ?>&quot; width=&quot;300px&quot; type=&quot;vertical&quot;]</code></p>
        </div>
    </div>
    <div class="vdpetform-admin-edit__block-two">
        <h1>Hoe werkt de editor?</h1>
        <p>Hieronder zie je twee velden. De vergelijker en de opties om de vergelijker aan te passen.
        De input velden aanpassen is heel simpel, je druk op een invulveld/kleurveld  en pas het aan hoe je wilt. Vervolgens klik je op 'opslaan'.</p>
    </div>
    <div class="vdpetform-admin-edit__block-edit">
        <div class="vd-admin-form">
            <form action="" method="POST">
                <div class="vd-admin-form-grid">
                    <div class="col">
                        <label for="btn_text">
                            <span class="vd-admin-form__label">
                                Knop tekst
                            </span>
                            <br>
                            <input 
                                type="input" 
                                id="btn_text" 
                                name="btn_text" 
                                value="<?= $data[0]->btn_text; if(empty($data[0]->btn_text)) { ?> Vergelijken <?php } ?>"
                            />
                        </label>
                    </div>
                </div>
                <div class="vd-admin-form-grid">
                    <div class="col">
                        <label class="vd-admin-form__label" for="border_color">
                            Kleur omlijning
                        </label>
                        <label>
                            <input 
                                type="text" 
                                id="border_color" 
                                name="border_color" 
                                value="<?= $data[0]->border_color;?>"
                                class="my-color-field" 
                            />
                        </label>
                    </div>
                    <div class="col">
                        <label class="vd-admin-form__label" for="card_color">
                            Achtergrond kleur
                        </label>
                        <label>
                            <input 
                                type="text" 
                                id="card_color" 
                                name="card_color" 
                                value="<?= $data[0]->card_color;?>"
                                class="my-color-field" 
                            />
                        </label>
                    </div>
                </div>
                <div class="vd-admin-form-grid">
                    <div class="col">
                        <label class="vd-admin-form__label" for="text_color">
                            Tekst kleur
                        </label>
                        <label>
                            <input 
                                type="text" 
                                id="text_color" 
                                name="text_color" 
                                value="<?= $data[0]->text_color;?>"
                                class="my-color-field" 
                            />
                        </label>
                    </div>
                    <div class="col">
                        <label class="vd-admin-form__label" for="btn_color">
                            Knop kleur
                        </label>
                        <label>
                            <input 
                                type="text" 
                                id="btn_color" 
                                name="btn_color" 
                                value="<?= $data[0]->btn_color;?>"
                                class="my-color-field" 
                            />
                        </label>
                    </div>
                </div>
                <div class="vd-admin-form-grid">
                    <div class="col">
                        <label class="vd-admin-form__label" for="btn_text_color">
                            Knop tekst kleur
                        </label>
                        <label>
                            <input 
                                type="text" 
                                id="btn_text_color" 
                                name="btn_text_color" 
                                value="<?= $data[0]->btn_text_color;?>"
                                class="my-color-field" 
                            />
                        </label>
                    </div>
                </div>
                <div class="vd-admin-form-grid">
                    <div class="col">
                        <label for="border_thickness">
                            <span class="vd-admin-form__label">
                                Dikte omlijning
                            </span>
                            <br>
                            <select 
                                required="" 
                                aria-required="true" 
                                aria-invalid="false" 
                                name="border_thickness" 
                                id="border_thickness"
                            >
                                <option value="0" <?php if ($data[0]->border_thickness === "0" ){?>selected="" <?php } ?>>0px</option>
                                <option value="1" <?php if ($data[0]->border_thickness === "1" ){?>selected="" <?php } ?>>1px</option>
                                <option value="2" <?php if ($data[0]->border_thickness === "2" ){?>selected="" <?php } ?>>3px</option>
                                <option value="4" <?php if ($data[0]->border_thickness === "4" ){?>selected="" <?php } ?>>4px</option>
                                <option value="5" <?php if ($data[0]->border_thickness === "5" ){?>selected="" <?php } ?>>5px</option>
                                <option value="10" <?php if ($data[0]->border_thickness === "10"){?>selected="" <?php } ?>>10px</option>
                                <option value="15" <?php if ($data[0]->border_thickness === "15"){?>selected="" <?php } ?>>15px</option>
                                <option value="20" <?php if ($data[0]->border_thickness === "20"){?>selected="" <?php } ?>>20px</option>
                                <option value="25" <?php if ($data[0]->border_thickness === "25"){?>selected="" <?php } ?>>25px</option>
                                <option value="30" <?php if ($data[0]->border_thickness === "30"){?>selected="" <?php } ?>>30px</option>
                            </select>
                        </label>
                    </div>
                    <div class="col">
                        <label for="border_thickness">
                            <span class="vd-admin-form__label">
                                Achtergrond rondingen
                            </span>
                            <br>
                            <select 
                                required="" 
                                aria-required="true" 
                                aria-invalid="false" 
                                name="card_border_radius" 
                                id="card_border_radius"
                            >
                                <option value="0" <?php if ($data[0]->card_border_radius === "0" ){?>selected="" <?php } ?>>0px</option>
                                <option value="5" <?php if ($data[0]->card_border_radius === "5" ){?>selected="" <?php } ?>>5px</option>
                                <option value="10" <?php if ($data[0]->card_border_radius === "10"){?>selected="" <?php } ?>>10px</option>
                                <option value="15" <?php if ($data[0]->card_border_radius === "15"){?>selected="" <?php } ?>>15px</option>
                                <option value="20" <?php if ($data[0]->card_border_radius === "20"){?>selected="" <?php } ?>>20px</option>
                                <option value="25" <?php if ($data[0]->card_border_radius === "25"){?>selected="" <?php } ?>>25px</option>
                                <option value="30" <?php if ($data[0]->card_border_radius === "30"){?>selected="" <?php } ?>>30px</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="vd-admin-form-grid">
                    <div class="col">
                        <label for="border_thickness">
                            <span class="vd-admin-form__label">
                                Ruimte rond vergelijker
                            </span>
                            <br>
                            <select 
                                required="" 
                                aria-required="true" 
                                aria-invalid="false" 
                                name="card_padding" 
                                id="card_padding"
                            >
                                <option value="0" <?php if ($data[0]->card_padding === "0" ){?>selected="" <?php } ?>>0px</option>
                                <option value="5" <?php if ($data[0]->card_padding === "5" ){?>selected="" <?php } ?>>5px</option>
                                <option value="10" <?php if ($data[0]->card_padding === "10"){?>selected="" <?php } ?>>10px</option>
                                <option value="15" <?php if ($data[0]->card_padding === "15"){?>selected="" <?php } ?>>15px</option>
                                <option value="20" <?php if ($data[0]->card_padding === "20"){?>selected="" <?php } ?>>20px</option>
                                <option value="25" <?php if ($data[0]->card_padding === "25"){?>selected="" <?php } ?>>25px</option>
                                <option value="30" <?php if ($data[0]->card_padding === "30"){?>selected="" <?php } ?>>30px</option>
                            </select>
                        </label>
                    </div>
                </div>
                <input type="submit" class="vd-button" value="Opslaan" name="save_options">
            </form>
        </div>
    </div>
    <div class="vdpetform-admin-edit__block-form">
        <?php
            if ($data[0]->form_type == 1) {
                include(plugin_dir_path(__FILE__) . 'forms/vdpetform-admin-form-pet.php');
            } else if ($data[0]->form_type == 2) {
                include(plugin_dir_path(__FILE__) . 'forms/vdpetform-admin-form-bike.php');
            } else if ($data[0]->form_type == 3) {
                include(plugin_dir_path(__FILE__) . 'forms/vdpetform-admin-form-motor.php');
            }
        ?>
    </div>
</div>