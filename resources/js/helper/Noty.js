import Noty from 'noty'
// import "~noty/src/noty.scss";
// import "~noty/src/themes/mint.scss";


const defaults = {
    layout: 'topRight',
    theme: 'mint',
    progressBar: true,
    timeout: 1300,
    closeWith: ['click'],
};

const VueNoty = {
    options: {
        animation: {
            open: 'animated bounceInRight', // Animate.css class names
            close: 'animated bounceOutRight' // Animate.css class names
        }
    },

    setOptions (opts) {
        this.options = Object.assign({}, defaults, opts)
        return this
    },

    create (params) {
        return new Noty(params)
    },

    show (text, type = 'alert') {
        const params = Object.assign({}, this.options, {
            type,
            text
        });

        const noty = this.create(params)
        noty.show()
        return noty
    },

    success (text) {
        return this.show(text, 'success')
    },

    error (text) {
        return this.show(text, 'error')
    },

    warning (text) {
        return this.show(text, 'warning')
    },

    info (text) {
        return this.show(text, 'info')
    }
}

export default {
    install: function (Vue,) {
        const noty = VueNoty.setOptions();
        Vue.prototype.$noty = noty;
        Vue.noty = noty
    }
}
