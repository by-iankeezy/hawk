import axios from 'axios'
import Cookies from 'js-cookie'
import * as types from '../mutation-types'

// state
export const state = {
    connected: false,
    error: '',
    message: '',
}

// getters
export const getters = {
  user: state => state.user,
  token: state => state.token,
  check: state => state.user !== null
}

// mutations
export const mutations = {
  [types.SOCKET_CONNECT] (state) {
    state.connected = true
  },
  [types.SOCKET_DISCONNECT] (state) {
    state.connected = false
  },
  [types.SOCKET_MESSAGE] (state, {message}) {
    state.message = message
  },
  [types.SOCKET_HELLO_WORLD] (state, {message}) {
    state.message = message
  },
  [types.SOCKET_ERROR] (state, {message}) {
    state.error = message.error
  },
}

// actions
// export const actions = {
//   saveToken ({ commit, dispatch }, payload) {
//     commit(types.SAVE_TOKEN, payload)
//   },
// }
