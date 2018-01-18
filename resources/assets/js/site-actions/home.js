import query from "axios";
import { HOME } from './action-type';
const prefix = "home-page/";
const action = "Home action";

export default function homeRequest (data){
  switch (data.action){
    case "home": return this.homeIndex(data);
  }

  console.log(action + " error: '/" + data.action + "' not found");
  return { errors: {}, isValid: false }
}

export function homeIndex(data) {
  return{
    type: HOME,
    payload: query.get(prefix + "", data)
  }
}