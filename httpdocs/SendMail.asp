<%@ Language="VBScript" %>
<%              
    Dim conn, rs 
    dim campaign, keyword
    dim vDupFound
    dim unBody

    on error resume next
    'on error goto vDisplatErrorMsg

    unSource=request.QueryString("unsrs") 
    
    unName = Request.Form("txtFullName")
    unEmail = Request.Form("txtEmailId")
    unMessege = Request.Form("txtEmailBody")    

    unsDate =FormatDateTime(Date, vbShortDate)
    unsTime =FormatDateTime(Now, vbShortTime) 

    sMailServer = "mail.clipmyimages.com"
    
    Set objMail = Server.CreateObject("CDO.Message")
    Set objConf = Server.CreateObject("CDO.Configuration") 
    Set objFields = objConf.Fields

    With objFields
        .Item("http://schemas.microsoft.com/cdo/configuration/sendusing") = 2
        .Item("http://schemas.microsoft.com/cdo/configuration/smtpserver") = sMailServer 
        .Item("http://schemas.microsoft.com/cdo/configuration/smtpconnectiontimeout") = 10 
        .Item("http://schemas.microsoft.com/cdo/configuration/smtpserverport") = 25
        .Item("http://schemas.microsoft.com/cdo/configuration/sendusername") = "donotdelete@clipmyimages.com"
        .Item("http://schemas.microsoft.com/cdo/configuration/sendpassword") = "images123"
        .Item("http://schemas.microsoft.com/cdo/configuration/smtpauthenticate") = 1
        .Update 
    End With

        unBody="<table width='100%' border='1' cellspacing='0' cellpadding='0' style='background:#f8f8f8;'>"
        unBody=unBody+"<tr><td style='background:#669933;' colspan='2'><strong>Request Details</strong><br/><br/></td></tr>"
        unBody=unBody+"<tr><td><strong>Name:</strong></td><td> " + unName + " </td></tr>"
        unBody=unBody+"<tr><td><strong>Email:</strong></td><td> " + unEmail + "</td></tr>"
        unBody=unBody+"<tr><td><strong>Send Date:</strong></td><td> " & unsDate &" "& unsTime & "</td></tr>"
        unBody=unBody+"<tr><td><strong>Comment:</strong></td><td> " + unMessege + "</td></tr>"
        unBody=unBody+"</table>"
    
    With objMail
        Set .Configuration = objConf
        .From = unEmail
        .To = "donotdelete@clipmyimages.com"
        .To = "chakraborty.koushik@gmail.com"
        .Subject = "Web Query: "  & unName
        .HTMLBody = unBody 
    End With
    objMail.Send
    Request.Form("txtFullName").value=err.Description &" / Mail Sent"
%> 
  
