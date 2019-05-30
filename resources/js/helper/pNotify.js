
class Notify {

    success(message){
        new PNotify({
            title: 'Success',
            text: message,
            addclass: 'alert bg-success alert-styled-right',
            type: 'success'
        });
    };

    error(message){
        new PNotify({
            title: 'Error',
            text: message,
            addclass: 'alert bg-danger alert-styled-right',
            type: 'error'
        });
    };

    validation(message){
        new PNotify({
            title: 'Validation',
            text: message,
            addclass: 'alert bg-warning alert-styled-right',
            type: 'error'
        });
    };

    warning(message){
        new PNotify({
            title: 'Warning',
            text: message,
            addclass: 'alert bg-warning alert-styled-right',
            type: 'warning'
        });
    };

    info(message){
        new PNotify({
            title: 'Info',
            text: message,
            addclass: 'alert bg-info alert-styled-right',
            type: 'info'
        });
    }
}

export default Notify = new Notify;