import axios from 'axios'
import Cookies from 'js-cookie'
import * as types from '../mutation-types'

// state
export const state = {
  requireNav: false
}

// getters
export const getters = {
    requireNav: state => state.requireNav,
}

// mutations
export const mutations = {
  [types.REQUIRE_NAV] (state, { data }) {
    state.requireNav = data
  }
}

// actions
export const actions = {
  changeNav ({ commit }, payload) {
    commit(types.REQUIRE_NAV, payload)
  },
}
