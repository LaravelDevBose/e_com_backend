<div class="footer">
    <table style="width: 100%">
        <tr>
            <td class="footerLeft"> © {{date('Y')}} {{ env('APP_NAME') }} | By : <a target="_blank" href="{{ route('front.index') }}">{{ env('APP_NAME') }}</a></td>
            <td class="footerRight"> Email:  {{ env('MAIL_FROM') }}</td>
        </tr>
    </table>
</div>


</div>
</body>
</html>
