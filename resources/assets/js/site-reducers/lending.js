import { LENDING } from '../site-actions/action-type';

const initialState = {
  response:{},
  fetching: false,
  fetched: false,
  error: null,
};
const LENDING_REJECTED = LENDING + "_REJECTED";
const LENDING_FULFILLED = LENDING + "_FULFILLED";

export default function reducer(state=initialState, action) {

  switch (action.type) {
    case LENDING: {
      return {...state, fetching: true, response: action.type}
    }
    case LENDING_FULFILLED: {
      return {...state, fetching: false, fetched: true, error: null, response: action.payload}
    }
    case LENDING_REJECTED: {
      return {...state, fetching: false, error: action.payload}
    }
  }

  return state
}
