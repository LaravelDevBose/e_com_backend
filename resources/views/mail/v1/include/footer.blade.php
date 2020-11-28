<div class="footer">
    <table style="width: 100%">
        <tr>
            <td class="footerLeft"> © {{date('Y')}} {{ config('app.name') }} | By : <a target="_blank" href="{{ config('app.url') }}">{{ config('app.name') }}</a></td>
            <td class="footerRight">
                <div class="comp-info">
                    <h6>
                        <a href="{{ config('app.url') }}"> {{ config('app.name') }}</a>
                    </h6>
                    <p>
                        <i class="fad fa-envelope"></i> <span>info@saliim.com</span>
                        <i class="fad fa-phone"></i> <span>{{ (!empty($contactInfos['contact_phone']))? $contactInfos['contact_phone'] : '' }}</span>
                    </p>
                    <p><i class="fad fa-map-marker-alt"></i> <span>{!!  (!empty($contactInfos['contact_address']))? $contactInfos['contact_address'] : ''  !!}</span></p>
                </div>
            </td>
        </tr>
    </table>
</div>
</div>
</body>
</html>
