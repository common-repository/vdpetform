<div class="vergelijkdirect-form">
    <p class="vergelijkdirect-form__title">
        Vergelijk motorverzekering
    </p>
        <input type="hidden" name="license_age_years" id="license_age_years" value="5">
        <label for="license" class="vergelijkdirect-form__label">Kenteken</label>
        <input 
            required="" 
            name="licence" 
            aria-required="true" 
            aria-invalid="false" 
            type="text" 
            placeholder="XX-XX-XX" 
            id="licence"
            maxlength="8"
            required 
        />
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
        <label for="birth_date" class="vergelijkdirect-form__label">Geboortedatum</label>
        <input 
            type="text" 
            id="birth_date" 
            name="birth_date"
            required
        />

        <label for="kilometrage" class="vergelijkdirect-form__label">Aantal kilometers per jaar</label>
        <select 
            name="kilometrage" 
            id="kilometrage" 
            aria-required="false" 
            aria-invalid="false"
            required="true"
        >
            <option value="5999">
                Minder dan 6000 km
            </option>
            <option value="11999">
                6000-12000 km
            </option>
            <option value="19999">
                12000-20000 km
            </option>
            <option value="30000">
                meer dan 20000 km
            </option>
        </select>

        <label for="damage_free_years" class="vergelijkdirect-form__label">Schade vrije jaren</label>
        <select 
            name="damage_free_years" 
            id="damage_free_years"
            aria-required="false" 
            aria-invalid="false"
            required="true"
        >
            <option value="default" selected="selected">Schadevrije jaren</option> 
            <option value="-5">-5</option>
            <option value="-4">-4</option>
            <option value="-3">-3</option>
            <option value="-2">-2</option>
            <option value="-1">-1</option>
            <option value="0">0</option> 
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
            <option value="32">32</option>
            <option value="33">33</option>
            <option value="34">34</option>
            <option value="35">35</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
        </select>
        <input type="hidden" name="coverage" id="coverage" value="bc">
        <input type="submit" id="Submit" class="vergelijkdirect-form__button" value="<?= $data[0]->btn_text ?>">
        <p>Vergelijking aangeboden door <a class="vergelijkdirect-form__link" href="https://vergelijkdirect.com/verzekeringen/motorverzekering/" target="_blank">Vergelijkdirect.com</a></p>
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
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
        transition: 0.2s ease-in-out;
        font-size:16px;
    }

    .vergelijkdirect-form__button:hover {
        background-color: <?= $data[0]->btn_color_hover ?>;
    }
</style>
        
<script src="https://unpkg.com/js-datepicker"></script>
<link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">

<script>
jQuery(document).ready(function($){

    const picker = datepicker('#birth_date', {
        formatter: (input, date, instance) => {
            const value = date.toLocaleDateString()
            input.value = value
        }
    });

    $("#Submit").click(function() {
        let rege = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i;
        let rege2 = /^[1-9][0-9]{3}$/i;

        let licence = $("#licence").val();
        let birth_date = $("#birth_date").val();
        let postcode = $("#postcode").val();
        let damage_free_years = $("#damage_free_years").val();
        let license_age_years = $("#license_age_years").val();
        let kilometrage = $("#kilometrage").val();
        let coverage = $("#coverage").val();
        console.log(birth_date)
        if (birth_date && postcode && damage_free_years && license_age_years && kilometrage && coverage) {
            
            if (rege.test(postcode) || rege2.test(postcode)) {
                var url = `https://vergelijkdirect.com/verzekeringen/motorverzekering/dekkingen/?license_age_years=${license_age_years}&licence=${licence}&postcode=${postcode}&birth_date=${birth_date}&kilometrage=${kilometrage}&damage_free_years=${damage_free_years}&coverage=${coverage}`;
                var win = window.open(url);
                return true;
                win.focus();
            } else {
                alert(`${postcode} is geen geldige postcode`);
            }
        } else {
            alert("Vul alle velden in");
        }
    });
})

</script>
