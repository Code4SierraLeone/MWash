<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main>
    <div class="container section" id="addwp">
        <div class="row">
            <form id="nwp-form" class="col s12">
                <input name="newid" id="newid" type="hidden" class="validate">
                <input name="nw_lon" id="nw_lon" type="hidden" class="validate">
                <input name="nw_lat" id="nw_lat" type="hidden" class="validate">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="nw_name" id="nw_name" type="text" class="validate">
                        <label for="nw_name">Name</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="nw_used" id="nw_used">
                            <option value="0" disabled selected>Choose your option</option>
                            <option value="true">True</option>
                            <option value="false">False</option>
                            <option value="Unknown">Unknown</option>
                        </select>
                        <label for="nw_used">The Water Point Is being used?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="nw_prov" id="nw_prov" type="text" class="validate">
                        <label for="nw_prov">Province Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="nw_dist" id="nw_dist" type="text" class="validate">
                        <label for="nw_dist">District Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="nw_chief" id="nw_chief" type="text" class="validate">
                        <label for="nw_chief">Chiefdom Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="nw_section" id="nw_section" type="text" class="validate">
                        <label for="nw_section">Section</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="nw_parts" id="nw_parts">
                            <option value="0" disabled selected>Choose your option</option>
                            <option value="More than 20 miles">More Than 20 Miles</option>
                            <option value="Within 20 mile">Within 20 Miles</option>
                            <option value="In this community">In This Community</option>
                        </select>
                        <label>Repair Parts Availability</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="nw_mechanic" id="nw_mechanic">
                            <option value="0" disabled selected>Choose your option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Unknown">Unknown</option>
                        </select>
                        <label>Water Point Mechanic</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="nw_money" id="nw_money">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="No- water is free">No - Water Is Free</option>
                            <option value="Only if there is a breakdown">Only If There Is A Breakdown</option>
                            <option value="No water">No Water</option>
                            <option value="Yes- regularly">Yes - Regularly</option>
                            <option value="Other">Other</option>
                        </select>
                        <label>Does The Community Pay For Water?</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="nw_age" id="nw_age" type="text" class="validate">
                        <label for="nw_age">Year Built or Constructed or Discovered?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="nw_manager" id="nw_manager" type="text" class="validate">
                        <label for="nw_manager">Water Point Management</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="nw_funct" id="nw_funct">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Yes- functional">Yes - Functional</option>
                            <option value="No- broken down">No - Broken Down</option>
                            <option value="Yes- but partly damaged">Yes - But Partly Damaged</option>
                            <option value="No- still under construction">No - Still Under Construction</option>
                        </select>
                        <label for="nw_funct">Is The Water Point Functional?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="nw_wtype" id="nw_wtype">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Pump on hand-dug well">Pump On Hand-Dug Well</option>
                            <option value="Protected Well (no pump)">Protected Well (No Pump)</option>
                            <option value="Standpipe or Tapstand">Standpipe or Tapstand</option>
                            <option value="Pump on borehole">Pump On Borehole</option>
                            <option value="Water Kiosk with Tank">Water Kiosk With Tank</option>
                            <option value="Other">Other</option>
                        </select>
                        <label for="nw_wtype">What Method Is Used To Supply Water At The Water Point?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="nw_chlorine" id="nw_chlorine">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Unknown">Unknown</option>
                        </select>
                        <label for="nw_chlorine">Is The Water Chlorinated?</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="nw_season" id="nw_season">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Water year-round">Water Year-Round</option>
                            <option value="Seasonal">Seasonal</option>
                            <option value="Dry Always / Never water">Dry Always / Never Water</option>
                            <option value="Unknown">Unknown</option>
                        </select>
                        <label for="nw_chlorine">Season</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="nw_quality" id="nw_quality">
                            <option value="" disabled selected>Choose your option</option>
                            <option value="Clean (good smell- taste and color)">Yes</option>
                            <option value="Not clean">No</option>
                            <option value="Unknown">Unknown</option>
                        </select>
                        <label for="nw_quality">Is The Water Chlorinated?</label>
                    </div>
                </div>
                <div class="row">
                    <h5>Navigate To The Position (Drag The Marker)</h5>
                    <div id="mapCanvas"></div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <a class="waves-effect indigo lighten-1 waves-green btn-flat" id="submit-nwp">Submit</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
