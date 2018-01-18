import { PROFILE, PROFILE_DETAILS, PROFILE_SETTINGS } from '../site-actions/action-type';

const initialState = {
  response:{},
  fetching: false,
  fetched: false,
  error: null,
};
const PROFILE_REJECTED  = PROFILE + "_REJECTED";
const PROFILE_FULFILLED = PROFILE + "_FULFILLED";

const PROFILE_DETAILS_REJECTED  = PROFILE_DETAILS + "_REJECTED";
const PROFILE_DETAILS_FULFILLED = PROFILE_DETAILS + "_FULFILLED";

const PROFILE_SETTINGS_REJECTED   = PROFILE_SETTINGS + "_REJECTED";
const PROFILE_SETTINGS_FULFILLED  = PROFILE_SETTINGS + "_FULFILLED";

export default function reducer(state=initialState, action) {

  switch (action.type) {
    case PROFILE: {
      return {...state, fetching: true, response: action.type}
    }
    case PROFILE_FULFILLED: {
      return {...state, fetching: false, fetched: true, error: null, response: action.payload}
    }
    case PROFILE_REJECTED: {
      return {...state, fetching: false, error: action.payload}
    }

    case PROFILE_DETAILS: {
      return {...state, fetching: true, response: action.type}
    }
    case PROFILE_DETAILS_FULFILLED: {
      return {...state, fetching: false, fetched: true, error: null, response: action.payload}
    }
    case PROFILE_DETAILS_REJECTED: {
      return {...state, fetching: false, error: action.payload}
    }

    case PROFILE_SETTINGS: {
      return {...state, fetching: true, response: action.type}
    }
    case PROFILE_SETTINGS_FULFILLED: {
      return {...state, fetching: false, fetched: true, error: null, response: action.payload}
    }
    case PROFILE_SETTINGS_REJECTED: {
      return {...state, fetching: false, error: action.payload}
    }
  }

  return state
}
