import query from "axios";
import { LENDING } from './action-type';
const prefix = "lending/";
const action = "Lending action";

export default function lendingRequest (data){
  switch (data.action){
    case "lending": return this.lendingIndex(data);
  }

  console.log(action + " error: '/" + data.action + "' not found in ");
  return { errors: {}, isValid: false }
}

export function lendingIndex(data) {
  return{
    type: LENDING,
    payload: query.get(prefix + "user-lending", data)
  }
}