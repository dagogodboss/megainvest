import { WALLETS } from '../site-actions/action-type';

const initialState = {
  response: {},
  fetching: false,
  fetched: false,
  error: null,
};
const WALLETS_REJECTED = WALLETS + "_REJECTED";
const WALLETS_FULFILLED = WALLETS + "_FULFILLED";

export default function reducer(state=initialState, action) {

  switch (action.type) {
    case WALLETS: {
      return {
        ...state,
        fetching: true
      }
    }
    case WALLETS_FULFILLED: {
      return {
        ...state,
        error: null,
        fetched: true,
        fetching: false,
        response: action.payload
      }
    }
    case WALLETS_REJECTED: {
      return {
        ...state,
        fetching: false,
        error: action.payload
      }
    }
  }

  return state
}
