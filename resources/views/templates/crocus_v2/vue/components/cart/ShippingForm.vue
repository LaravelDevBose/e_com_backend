<template>
    <div class="shipping-form">
        <form id="shipping-zip-form" method="post" action="#estimatePost/">
            <p>Enter your destination to get a shipping estimate.</p>
            <ul class="form-list">
                <li>
                    <label class="required" for="country"><em>*</em>Country</label>
                    <div class="input-box">
                        <select title="Country" class="validate-select" id="country" name="country_id">
                            <option value=""> </option>
                            <option value="AF">Afghanistan</option>
                            <option value="AX">Åland Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="VG">British Virgin Islands</option>
                            <option value="BN">Brunei</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos [Keeling] Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo - Brazzaville</option>
                            <option value="CD">Congo - Kinshasa</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d’Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong SAR China</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Laos</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macau SAR China</option>
                            <option value="MK">Macedonia</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia</option>
                            <option value="MD">Moldova</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar [Burma]</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="AN">Netherlands Antilles</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="KP">North Korea</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territories</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn Islands</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russia</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">São Tomé and Príncipe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="KR">South Korea</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syria</option>
                            <option value="TW">Taiwan</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option selected="selected" value="US">United States</option>
                            <option value="UY">Uruguay</option>
                            <option value="UM">U.S. Minor Outlying Islands</option>
                            <option value="VI">U.S. Virgin Islands</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VA">Vatican City</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Vietnam</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                    </div>
                </li>
                <li>
                    <label for="region_id">State/Province</label>
                    <div class="input-box">
                        <select style="" title="State/Province" name="region_id" id="region_id" defaultvalue="" class="required-entry validate-select">
                            <option value="">Please select region, state or province</option>
                            <option value="1" title="Alabama">Alabama</option>
                            <option value="2" title="Alaska">Alaska</option>
                            <option value="3" title="American Samoa">American Samoa</option>
                            <option value="4" title="Arizona">Arizona</option>
                            <option value="5" title="Arkansas">Arkansas</option>
                            <option value="6" title="Armed Forces Africa">Armed Forces Africa</option>
                            <option value="7" title="Armed Forces Americas">Armed Forces Americas</option>
                            <option value="8" title="Armed Forces Canada">Armed Forces Canada</option>
                            <option value="9" title="Armed Forces Europe">Armed Forces Europe</option>
                            <option value="10" title="Armed Forces Middle East">Armed Forces Middle East</option>
                            <option value="11" title="Armed Forces Pacific">Armed Forces Pacific</option>
                            <option value="12" title="California">California</option>
                            <option value="13" title="Colorado">Colorado</option>
                            <option value="14" title="Connecticut">Connecticut</option>
                            <option value="15" title="Delaware">Delaware</option>
                            <option value="16" title="District of Columbia">District of Columbia</option>
                            <option value="17" title="Federated States Of Micronesia">Federated States Of Micronesia</option>
                            <option value="18" title="Florida">Florida</option>
                            <option value="19" title="Georgia">Georgia</option>
                            <option value="20" title="Guam">Guam</option>
                            <option value="21" title="Hawaii">Hawaii</option>
                            <option value="22" title="Idaho">Idaho</option>
                            <option value="23" title="Illinois">Illinois</option>
                            <option value="24" title="Indiana">Indiana</option>
                            <option value="25" title="Iowa">Iowa</option>
                            <option value="26" title="Kansas">Kansas</option>
                            <option value="27" title="Kentucky">Kentucky</option>
                            <option value="28" title="Louisiana">Louisiana</option>
                            <option value="29" title="Maine">Maine</option>
                            <option value="30" title="Marshall Islands">Marshall Islands</option>
                            <option value="31" title="Maryland">Maryland</option>
                            <option value="32" title="Massachusetts">Massachusetts</option>
                            <option value="33" title="Michigan">Michigan</option>
                            <option value="34" title="Minnesota">Minnesota</option>
                            <option value="35" title="Mississippi">Mississippi</option>
                            <option value="36" title="Missouri">Missouri</option>
                            <option value="37" title="Montana">Montana</option>
                            <option value="38" title="Nebraska">Nebraska</option>
                            <option value="39" title="Nevada">Nevada</option>
                            <option value="40" title="New Hampshire">New Hampshire</option>
                            <option value="41" title="New Jersey">New Jersey</option>
                            <option value="42" title="New Mexico">New Mexico</option>
                            <option value="43" title="New York">New York</option>
                            <option value="44" title="North Carolina">North Carolina</option>
                            <option value="45" title="North Dakota">North Dakota</option>
                            <option value="46" title="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="47" title="Ohio">Ohio</option>
                            <option value="48" title="Oklahoma">Oklahoma</option>
                            <option value="49" title="Oregon">Oregon</option>
                            <option value="50" title="Palau">Palau</option>
                            <option value="51" title="Pennsylvania">Pennsylvania</option>
                            <option value="52" title="Puerto Rico">Puerto Rico</option>
                            <option value="53" title="Rhode Island">Rhode Island</option>
                            <option value="54" title="South Carolina">South Carolina</option>
                            <option value="55" title="South Dakota">South Dakota</option>
                            <option value="56" title="Tennessee">Tennessee</option>
                            <option value="57" title="Texas">Texas</option>
                            <option value="58" title="Utah">Utah</option>
                            <option value="59" title="Vermont">Vermont</option>
                            <option value="60" title="Virgin Islands">Virgin Islands</option>
                            <option value="61" title="Virginia">Virginia</option>
                            <option value="62" title="Washington">Washington</option>
                            <option value="63" title="West Virginia">West Virginia</option>
                            <option value="64" title="Wisconsin">Wisconsin</option>
                            <option value="65" title="Wyoming">Wyoming</option>
                        </select>
                        <input type="text" style="display:none;" class="input-text required-entry" title="State/Province" value="" name="region" id="region">
                    </div>
                </li>
                <li>
                    <label for="postcode">Zip/Postal Code</label>
                    <div class="input-box">
                        <input type="text" value="" name="estimate_postcode" id="postcode" class="input-text validate-postcode">
                    </div>
                </li>
            </ul>
            <div class="buttons-set11">
                <button class="button get-quote" onClick="coShippingMethodForm.submit()" title="Get a Quote" type="button"><span>Get a Quote</span></button>
            </div>
            <!--buttons-set11-->
        </form>
    </div>
</template>

<script>
    export default {
        name: "ShippingForm"
    }
</script>

<style scoped>

</style>
