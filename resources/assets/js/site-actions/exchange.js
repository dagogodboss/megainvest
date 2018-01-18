import query from "axios";
import { EXCHANGE } from './action-type';
const action = "Exchange action";
const prefix = "exchange/";

export default function exchangeRequest (data){
  switch (data.action){
    case "exchange": return this.exchangeIndex(data);
  }

  console.log(action + " error: '/" + data.action + "' not found");
  return { errors: {}, isValid: false }
}

export function exchangeIndex(data) {
  return{
    type: EXCHANGE,
    payload: query.get(prefix + "user-exchange", data)
  }
}