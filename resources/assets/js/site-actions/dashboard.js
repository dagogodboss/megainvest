import query from "axios";
import { DASHBOARD } from './action-type';
const prefix = "dashboard/";
const action = "Dashboard action";


export default function dashboardRequest (data){
  switch (data.action){
    case "dashboard": return this.dashboardIndex(data);
  }

  console.log(action + " error: " + data.action + "' not found");
  return { errors: {}, isValid: false }
}

export function dashboardIndex(data) {
  return{
    type: DASHBOARD,
    payload: query.get(prefix + "user-dashboard", data)
  }
}