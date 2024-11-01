<div class="vergelijkdirect-form">
    <p class="vergelijkdirect-form__title">
        Vergelijk dierenverzekering
    </p>

    <label for="kind" class="vergelijkdirect-form__label">Hond of kat</label>
    <select 
        required
        aria-required="true" 
        aria-invalid="false" 
        name="kind" 
        id="kind"
    >
        <option value="dog">Hond</option>
        <option value="cat">Kat</option>
    </select>

    <label for="sex" class="vergelijkdirect-form__label">Geslacht</label>
    <select 
        required
        aria-required="true" 
        aria-invalid="false" 
        name="sex" 
        id="sex" 
    >
        <option value="m" selected>Mannetje</option>
        <option value="f">Vrouwtje</option>
    </select>

    <label for="age" class="vergelijkdirect-form__label">Leeftijd</label>
    <select 
        required
        aria-required="true" 
        aria-invalid="false" 
        name="age" 
        id="age" 
    >
        <option disabled="disabled" value="">Selecteer <span class="error age<?= $data[0]->form_id ?>-error"></span></option>
        <option value="0" selected="">0 jaar</option>
        <option value="1">1 jaar</option>
        <option value="2">2 jaar</option>
        <option value="3">3 jaar</option>
        <option value="4">4 jaar</option>
        <option value="5">5 jaar</option>
        <option value="6">6 jaar</option>
        <option value="7">7 jaar</option>
        <option value="8">8 jaar</option>
        <option value="9">9 jaar</option>
        <option value="10">10 jaar</option>
        <option value="11">11 jaar</option>
        <option value="12">12 jaar</option>
        <option value="13">13 jaar</option>
    </select>

    <label for="postcode" class="vergelijkdirect-form__label">Postcode <span class="error postcode<?= $data[0]->form_id ?>-error"></span></label>
    <input 
        required="" 
        name="postcode" 
        aria-required="true" 
        aria-invalid="false" 
        type="text" 
        placeholder="1234AB" 
        id="postcode"
        maxlength="6" 
    />

    <label for="race" class="vergelijkdirect-form__label">Ras</label>
    <select 
        required="" 
        aria-required="true" 
        aria-invalid="false" 
        name="breed" 
        id="race"
    >
    </select>

    <p>Heb je geen rashond of een kruising? Selecteer dan het ras waar ie het meeste op lijkt!</p>
    <button 
        class="vergelijkdirect-form__button" 
        id="submitform" 
        type="submit"
    >
        <?=$data[0]->btn_text?>
    </button>

    <p>Vergelijking aangeboden door <a class="vergelijkdirect-form__link" href="https://vergelijkdirect.com/verzekeringen/dierenverzekering/" target="_blank">Vergelijkdirect.com</a></p>
</div>
<style>
    .vergelijkdirect-form {
        background: <?= $data[0]->card_color ?>;
        padding: <?= $data[0]->card_padding ?>px;
        color: <?= $data[0]->text_color ?>;
        border: <?= $data[0]->border_thickness ?>px solid <?= $data[0]->border_color ?>;
        border-radius: <?= $data[0]->card_border_radius ?>px;
        max-width: 300px;
    }

    .vergelijkdirect-form input[type=text], select, textarea {
        width: 100%;
        padding: 7.5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        resize: vertical;
    }

    .vergelijkdirect-form select {
        padding: 7.5px!important;
        height: auto!important;
        margin: 0;
    }

    .vergelijkdirect-form__label{
        padding: 12px 12px 12px 0;
        display: inline-block;
        font-weight: bold;
        font-size: 16px;
    }

    .vergelijkdirect-form__radiobutton label{
        padding: 2px;
        vertical-align: text-bottom;
        font-weight: normal;
    }

    .vergelijkdirect-form__title {
        font-size: 20px;
        font-weight: bold;
        margin: 0;
    }
 
    .vergelijkdirect-form__link {
        color: <?= $data[0]->text_color ?>;
    }

    .vergelijkdirect-form__button {
        background-color: <?= $data[0]->btn_color ?>;
        color: <?= $data[0]->btn_text_color ?>;
        padding: 12px 20px;
        border: none;
        width: 100%;
        border-radius: <?= $data[0]->btn_border_radius ?>px;
        cursor: pointer;
        margin-top: 10px;
        transition: 0.2s ease-in-out;
        font-size:16px;
    }

    .vergelijkdirect-form__button:hover {
        background-color: <?= $data[0]->btn_color_hover ?>;
    }
</style>

<script>
(function( $ ) {
	'use strict';
    $(document).ready(function () {
		let kind = $("#kind").val();
		giveSelection(kind);
    });
    
    $('#kind').change(function(){
        giveSelection($(this).val());
    });

	function giveSelection(kind) {
		if (kind === 'dog') {
			fetchBreedDog();
		} else if (kind === 'cat') {
			fetchBreedCat();
		}
	}

	function fetchBreedDog() {
		const select = $("#race");
		const url = 'https://api.vergelijkdirect.com/api/v1/categories/get/dogs';

		fetch(url)
        .then((resp) => resp.json())
        .then(function (data) {
            let breeds = data;
            for (var i = 0; i < breeds.length; i++) {
                select.find('option').remove().end();
                return breeds.map(function (author) {
                    select.append($("<option></option>").attr("value",data[i].id).text(data[i].name)); 
                    i++;
                })
            }
        })
        .catch(function (error) {
            console.log(JSON.stringify(error));
        });
	}

	function fetchBreedCat() {
		const select = $("#race");
		const url = 'https://api.vergelijkdirect.com/api/v1/categories/get/cats';

		fetch(url)
        .then((resp) => resp.json())
        .then(function (data) {
            let breeds = data;
            for (var i = 0; i < breeds.length; i++) {
                select.find('option').remove().end();
                return breeds.map(function (author) {
                    select.append($("<option></option>").attr("value",data[i].id).text(data[i].name)); 
                    i++;
                })
            }
        })
        .catch(function (error) {
            console.log(JSON.stringify(error));
        });
	}

	
    $('#postcode').on('keypress', function (e) {
        if (e.which == 32)
            return false;
    });

	$('button#submitform').click(function () {

		let postcode = $("#postcode").val();
        let sex = $("#sex").val();
        let age = $("#age").val();
        let race = $("#race").val();
        let kind = $("#kind").val();

		let regex1 = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i;
		let regex2 = /^[1-9][0-9]{3}$/i;
        
        if (sex && age && race && kind) {
		    if (regex1.test(postcode) || regex2.test(postcode)) {
                let url = `https://vergelijkdirect.com/verzekeringen/dierenverzekering/resultaat/?kind=${kind}&sex=${sex}&age=${age}&postcode=${postcode}&breed=${race}`;
                window.open(url);
            } else {
                alert(postcode + " is geen geldige postcode");
            }
		} else {
			alert("Alle velden moeten ingevuld zijn");
		}
	});
})( jQuery );

</script>