import VueNotifications from 'vue-notifications'
export default {
    notifications: {
        showSuccess: {
            type: VueNotifications.types.success,
            title: 'Success!',
            message: 'Action successful'
        },
        showInfo: {
            type: VueNotifications.types.info,
            title: 'Hey you',
            message: 'Here is some info for you'
        },
        showError: {
            type: VueNotifications.types.error,
            title: 'Oops!',
            message: "Something's wrong with, please check your internet and try again."
        },
        showWarn: {
            type: VueNotifications.types.warn,
            title: 'Wow, man',
            message: 'That\'s the kind of warning'
        }
    }
}
