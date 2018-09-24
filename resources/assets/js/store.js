export default {
    debug: true,
    state: {
        message: 'Hello!'
    },
    setMessageAction (newValue) {
        this.debug && console.log('setMessageAction triggered with', newValue)
        this.state.message = newValue
    },
    clearMessageAction () {
        this.debug && console.log('clearMessageAction triggered')
        this.state.message = 'action B triggered'
    }
}