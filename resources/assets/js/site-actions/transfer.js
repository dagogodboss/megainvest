import query from "axios";
import {LENDING, WALLETS} from './action-type';
const prefix = "transfer/";
const action = "Lending action";

export default function transferRequest (data){
  switch (data.action){
    case "lending": return this.transferIndex(data);
    case "action": return this.transferAction(data);
  }

  console.log(action + " error: '/" + data.action + "' not found in ");
  return { errors: {}, isValid: false }
}

export function transferIndex(data) {
  const url = prefix + "user-lending?";
  return{
    type: LENDING,
    payload: query.get(
      url +
      "query=" + data.query +
      "action=" + data.action +
      "apiKey=" + data.apiKey
    )
  };
}
export function transferAction(data) {
  return{
    type: LENDING,
    payload: query.post(prefix + "user-lending", data)
  }
}