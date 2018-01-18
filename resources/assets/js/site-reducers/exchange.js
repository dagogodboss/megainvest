import { EXCHANGE } from '../site-actions/action-type';

const initialState = {
  response:{},
  fetching: false,
  fetched: false,
  error: null,
};
const EXCHANGE_REJECTED = EXCHANGE + "_REJECTED";
const EXCHANGE_FULFILLED = EXCHANGE + "_FULFILLED";

export default function reducer(state=initialState, action) {

  switch (action.type) {
    case EXCHANGE: {
      return {...state, fetching: true, response: action.type}
    }
    case EXCHANGE_FULFILLED: {
      return {...state, fetching: false, fetched: true, error: null, response: action.payload}
    }
    case EXCHANGE_REJECTED: {
      return {...state, fetching: false, error: action.payload}
    }
  }

  return state
}
