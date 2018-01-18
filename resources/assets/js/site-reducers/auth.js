import { AUTH, USER } from '../site-actions/action-type';

const initialState = {
  user: {},
  error: null,
  isAuth: false,
  fetched: false,
  fetching: false,
};

const AUTH_REJECTED = AUTH + "_REJECTED";
const AUTH_FULFILLED = AUTH + "_FULFILLED";
const USER_REJECTED = USER + "_REJECTED";
const USER_FULFILLED = USER + "_FULFILLED";

export default function reducer(state=initialState, action) {

  switch (action.type) {
    case AUTH: {
      return {
        ...state,
        fetching: true
      }
    }
    case AUTH_FULFILLED: {
      return {
        ...state,
        error: null,
        isAuth: true,
        fetched: true,
        fetching: false,
      }
    }
    case AUTH_REJECTED: {
      return {
        ...state,
        isAuth: false,
        fetching: false,
        error: action.payload
      }
    }

    case USER: {
      return {
        ...state,
        fetching: true
      }
    }
    case USER_FULFILLED: {
      return {
        ...state,
        error: null,
        fetched: true,
        fetching: false,
        user: action.payload
      }
    }
    case USER_REJECTED: {
      return {
        ...state,
        fetching: false,
        error: action.payload
      }
    }
  }

  return state
}
