<tr>
    <td>
        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td class="content-cell" >
                    <div class="copyright">
                        {{ Illuminate\Mail\Markdown::parse($slot) }}
                    </div>
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
    </td>
</tr>
