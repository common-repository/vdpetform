<div class="vergelijkdirect-form">
    <p class="vergelijkdirect-form__title">
        Vergelijk fietsverzekering
    </p>
    <label for="bike_type" class="vergelijkdirect-form__label">Soort fiets</label>
    <select  
        name="bike_type"
        id="bike_type" 
        aria-required="true" 
        aria-invalid="false"
        required
    >
        <option disabled="disabled" value="">Selecteer je fiets</option> 
        <option value="E-bike">E-bike</option>
        <option value="Fiets">Fiets</option>
        <option value="Racefiets">Racefiets</option>
        <option value="Mountainbike">Mountainbike</option>
        <option value="Ligfiets">Ligfiets</option>
        <option value="Bakfiets">Bakfiets</option>
    </select>

    <label for="postcode" class="vergelijkdirect-form__label">Postcode</label>
    <input 
        required
        name="postcode" 
        aria-required="true" 
        aria-invalid="false" 
        type="text" 
        placeholder="1234AB" 
        id="postcode"
        maxlength="6" 
        required
    />
    <label for="condition" class="vergelijkdirect-form__label">Gekocht als</label>
    <div class="vergelijkdirect-form__radiobutton">
        <input 
            type="radio" 
            id="nieuw" 
            name="condition" 
            value="1" 
            checked 
        />
        <label for="nieuw">nieuw</label>
    </div>

    <div class="vergelijkdirect-form__radiobutton">
        <input 
            type="radio" 
            id="tweedehands"
            name="condition" 
            value="2" 
        />
        <label for="tweedehands">tweedehands</label>
    </div>

    <label for="price" class="vergelijkdirect-form__label">Aankoopprijs</label>
    <input 
        required
        name="price" 
        aria-required="true" 
        aria-invalid="false" 
        type="text" 
        id="price" 
        required
    />
    <input class="vergelijkdirect-form__button" type="submit" id="Submit" value="<?= $data[0]->btn_text ?>">
    <p>Vergelijking aangeboden door <a class="vergelijkdirect-form__link" href="https://vergelijkdirect.com/verzekeringen/fietsverzekering/" target="_blank">Vergelijkdirect.com</a></p>
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
        font-size:25px;
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

<script type="text/javascript">
    jQuery(document).ready(function($){
        $("#Submit").click(function() {
            let rege = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i;
            let rege2 = /^[1-9][0-9]{3}$/i;
            let numchk = new RegExp("^[0-9]*$");
            let biketype = $("#bike_type").val();
            let postcode = $("#postcode").val();
            let condition = $("input[name='condition']:checked").val();
            let price = $("#price").val();
            if (biketype && postcode && condition && price) {
                if (rege.test(postcode) || rege2.test(postcode)) {
                    if ( numchk.test(price) && price ){
                        let url = `https://vergelijkdirect.com/verzekeringen/fietsverzekering/resultaten/?bike_type=${biketype}&postcode=${postcode}&condition=${condition}&price=${price}`; 
                        let win = window.open(url);
                        return true;
                        win.focus();
                    } else {
                        alert("Prijs is incorrect. BV 1000");
                    }
                } else {
                    alert(`${postcode} is geen geldige postcode`);
                }
            } else {
                alert("Vul alle velden in");
            }
        });
    });
</script>






    <!-- /verzekeringen/fietsverzekering/resultaten/?bike_type=Fiets&postcode=3766AT&condition=1&price=666 -->