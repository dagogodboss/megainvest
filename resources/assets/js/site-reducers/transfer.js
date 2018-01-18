import { TRANSFER } from '../site-actions/action-type';

const initialState = {
  response:{},
  fetching: false,
  fetched: false,
  error: null,
};
const TRANSFER_REJECTED = TRANSFER + "_REJECTED";
const TRANSFER_FULFILLED = TRANSFER + "_FULFILLED";

export default function reducer(state=initialState, action) {

  switch (action.type) {
    case TRANSFER: {
      return {...state, fetching: true, response: action.type}
    }
    case TRANSFER_FULFILLED: {
      return {...state, fetching: false, fetched: true, error: null, response: action.payload}
    }
    case TRANSFER_REJECTED: {
      return {...state, fetching: false, error: action.payload}
    }
  }

  return state
}
