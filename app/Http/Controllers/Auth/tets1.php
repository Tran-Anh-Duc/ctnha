<style>
    td
    {
        font-size : 14px;
        padding: 4px;
    }
</style>
<form name="GroupRegistForm" method="post">
    <table width="100%">
        <tr>
            <td width="85%">&nbsp;</td>
            <td align="right" style="vertical-align: bottom;" >
                <input name="save" type="submit" value="Save" class="button-medium-save" onclick="opener.update_from_bcf(0,'',jQuery('#cut_of_date').val());" >
                <a onclick="print();" title="In">
                    <img src="packages/core/skins/default/images/printer.png" height="40">
                </a>
            </td>
        </tr>
    </table>

    <input type="text" name="reservation_id" value="<?php echo $this->map['customer']['booking_code']; ?>" style="display: none;" />
    <input type="text" name="total" id="total" value="<?php echo count($this->map['reservation_room_type']); ?>" style="display: none;" />
    <div id="print">
        <table cellspacing="0" with="750px"  >
            <tr>
                <td width="750" align = "center"><img src="resources/interfaces/images/default/logo.png" width="200px" ></td>
            </tr>
            <!---<tr>
                   <td width="750" align = "center" style = "font-size : 24px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;" >LAZI BEACH RESORT</td>
            </tr>--->
            <tr>
                <td width="750" align = "center" style = "font-size : 20px;" >REGISTRATION FORM</td>
            </tr>
            <tr>
                <td width="750" align = "center" style = "font-size : 16px;" >Booking No. : <b><?php echo $this->map['customer']['booking_code']; ?></td>
            </tr>
            <tr>
                <td width="750" >&nbsp;</td>
            </tr>
            <tr>
                <td width="750px"><strong>I. GUEST INFOMATION</strong></td>
            </tr>
            <tr>
                <td>
                    <table width="750px">
                        <tr>
                            <td width="100px"></td>
                            <td width="650"  >Guest's name:.......................................................................................................................................</td>
                        </tr>
                        <tr>
                            <td width="100px"></td>
                            <td width="650"  >Company: <b><?php echo ucfirst($this->map['customer']['ctm_name']); ?></b></td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="750px">
                        <tr>
                            <td width="100px"></td>
                            <td width="300" >Phone: <b><?php echo $this->map['customer']['ctm_phone']; ?></b></td>
                            <td width="350">Email: .......................................................................</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="750px">&nbsp;</td>
            </tr>
            <tr>
                <td width="750px"><strong>II. RESERVATION</strong></td>
            </tr>
            <tr>
                <td>
                    <table width="750px" cellspacing="0" >
                        <tr>
                            <td width="100px">&nbsp;</td>
                            <td width="10px" align="center" ><strong>No</strong></td>
                            <!---<td width="150" align="center" >
                                Guest's name
                            </td>--->
                            <td width="50px" align="center"><strong>Check-in day</strong></td>
                            <td width="50px" align="center"><strong>Check-out day</strong></td>
                            <td width="150px" align="center"><strong>Room type</strong></td>
                            <td width="100px" align="center"><strong>No. of room</strong></td>
                            <td width="100px" align="center"><strong>Room number</strong></td>
                            <!---<td width="150px" align="right"><strong>Room rate/night</strong></td>--->
                            <!---<td align="center" >
                                Note
                            </td>--->
                        </tr>
                        <!--LIST:reservation_room_type-->
                        <tr>
                            <td width="100px">&nbsp;</td>
                            <td align="center">[[|reservation_room_type.index|]]</td>
                            <!---<td  style="padding: 5px;" >
                            </td>--->
                            <td align="center">[[|reservation_room_type.arrive|]]</td>
                            <td align="center">[[|reservation_room_type.departure|]]</td>
                            <td align="center">[[|reservation_room_type.room_level|]]</td>
                            <td align="center">[[|reservation_room_type.total|]]</td>
                            <td align="center">[[|reservation_room_type.room_name|]]</td>
                            <!---<td align="right">[[|reservation_room_type.price|]] VND</td>--->
                            <!---<td style="padding: 5px;" >&nbsp;
                            </td>--->
                        </tr>
                        <!--/LIST:reservation_room_type-->
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td width="100px"></td>
                            <td width="650px"><br /><br /><i>- The above rates include breakfast.<br>-  The above rates DO NOT include items from the minibar. These will be charged separately
                                    <br>- Incase of group of Guests, please attach the rooming list.
                                </i></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="750px">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td width="750" colspan="8"  valign="top"><strong>III. PAYMENT</strong></td>
                        </tr>
                        <tr>
                            <td width="100px">&nbsp;</td>
                            <td width="250"><input type="checkbox" name="bcf_payment_1" id="bcf_payment_1" value="1" />
                                Cash</td>
                            <td width="250"><input type="checkbox" name="bcf_payment_2" id="bcf_payment_2" value="2" />
                                Credit card</td>
                            <td width="150"><input type="checkbox" name="bcf_payment_3" id="bcf_payment_3" value="3" />
                                Bank transfer</td>
                        </tr>
                        <tr>
                            <td width="100px">&nbsp;</td>
                            <td width="250"><input type="checkbox" name="bcf_payment_4" id="bcf_payment_4" value="4" />
                                Company/Travel Agency</td>
                            <td width="250"><input type="checkbox" name="bcf_payment_5" id="bcf_payment_5" value="5" />
                                By the Guest(s)</td>
                            <td width="150"><input type="checkbox" name="bcf_payment_6" id="bcf_payment_6" value="6" />
                                Others</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="750">
                        <tr>
                            <td width="550" align="center" valign="top" style="padding: 0;" ><strong>Deposit: <input size="25" type="text" name="need_deposit" id="need_deposit" value ="<?php echo System::display_number($this->map['customer']['need_deposit']); ?>" onkeyup="processStr();" /></strong></td>
                            <td width="500" align="center" >before:&nbsp;
                                <input size="10" type="text" name="cut_of_date" id="cut_of_date" value ="<?php echo $this->map['customer']['dealine_deposit']; ?>" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="750px">
                        <tr>
                            <td width="375" valign="top" align="center">
                            </td>
                            <td width="375" valign="top" align="center"><i>Lazi Town, Date <?php echo date("d/m/y"); ?></i>
                            </td>
                        </tr>
                        <tr>
                            <td width="375" valign="top" align="center">Guest's signature<br />
                                <br /><br /><br /><br /><br /><br /><br />
                            </td>
                            <td width="375" valign="top" align="center">Reception's signature<br />
                                <br /><br /><br /><br /><br /><br /><br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!--            <tr>-->
            <!--                <td width="750px"><br /><p align="center">--><?php //echo HOTEL_ADDRESS;?><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tel:&nbsp;<strong>--><?php //echo HOTEL_PHONE;?><!--</strong>&nbsp;&nbsp;&nbsp;&nbsp; Fax:&nbsp;<strong>--><?php //echo HOTEL_FAX;?><!--</strong>-->
            <!--                        <br />-->
            <!--                        Email: --><?php //echo HOTEL_EMAIL;?><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Website:&nbsp;<strong>--><?php //echo HOTEL_WEBSITE;?><!--</strong></p>-->
            <!--                </td>-->
            <!--            </tr>-->
            <tr>
                <td width="750px"><br /><p align="center"><?php echo HOTEL_ADDRESS;?>&nbsp;&nbsp; Telephone:&nbsp;<strong>02353 911 818</strong>&nbsp;Fax:&nbsp;<strong><?php echo HOTEL_FAX;?></strong>
                        <br />
                        Email: sales@hoianodysseyhotel.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Website:&nbsp;https://hoianodysseyhotel.com</strong></p>
                </td>
            </tr>
        </table>
    </div>
</form>
<script>
    jQuery(document).ready(function(){
        var bcf_payment = '<?php echo $this->map['customer']['bcf_payment']; ?>';
        var strValn = bcf_payment.replace(/,/g,"");

        var i;
        for(i = 0; i < strValn.length; i++)
        {
            document.getElementById("bcf_payment_"+strValn[i]).checked=true;
        }

        jQuery("#cut_of_date").datepicker();
    });

    function processStr()
    {
        var strVal = jQuery("#need_deposit").val();
        var strValn = strVal.replace(/,/g,"");

        var len = strValn.length;
        var i;
        var newStr = '';
        for(i = len; i > 0; i-=3)
        {
            var strTmp;
            if(i-3 > 0)
                strTmp = ','+strValn.substr(i-3,3);
            else
                strTmp = strValn.substr(0,i);

            newStr = strTmp+newStr;
        }
        jQuery("#need_deposit").val(newStr);
    }

    function print()
    {
        var inputs = jQuery('table input:radio:checked,table input:checkbox:checked');
        for (var i=0;i<inputs.length;i++)
        {
            var typ=document.createAttribute("checked");
            typ.nodeValue="true";
            inputs[i].attributes.setNamedItem(typ);
        }

        document.getElementById("need_deposit").style.border=0;
        document.getElementById("cut_of_date").style.border=0;

        //BookingConfirmForm.submit();
        printWebPart('print');
    }
</script>
