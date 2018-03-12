#!/usr/bin/env bash

# Custom deployment script for tm.id.au WordPress theme.
#
# @author Tim Malone <tdmalone@gmail.com>

# Get current EC2 instance state - we'll need this to determine whether we need to return the state afterwards.
INSTANCE_STATE="$(aws ec2 describe-instances --instance-ids "${TM_AWS_INSTANCE}" | jq '.Reservations[0].Instances[0].State.Name' --raw-output)"

# Get the IP address of the CI machine we're running on - we'll need this to add firewall exceptions.
CURRENT_IP="$(curl http://api.ipify.org)"

# TODO: Act based on INSTANCE_STATE (https://docs.aws.amazon.com/AWSEC2/latest/APIReference/API_InstanceState.html)
#       - if 'pending', 'shutting-down' or 'stopping', wait and poll again
#       - if 'running', continue as normal
#       - if 'terminated', stop and error the deployment
#       - if 'stopped', start the instance (aws ec2 start-instances --instance-ids "${TM_AWS_INSTANCE}"), wait and poll again

# Add current IP to the firewall.
aws ec2 authorize-security-group-ingress --group-id "${TM_AWS_SECURITY_GROUP}" --protocol tcp --port 80 --cidr="${CURRENT_IP}"/32
aws ec2 authorize-security-group-ingress --group-id "${TM_AWS_SECURITY_GROUP}" --protocol tcp --port "${TM_AWS_PORT}" --cidr="${CURRENT_IP}"/32

# TODO: Deploy theme (probably via SSH and git).

# Remotely call the custom endpoint that causes static site re-generation.
# Server will then sync to S3 via lsync.
curl -X POST --header "X-Tm-Api-Key: ${TM_WP_REST_API_TOKEN}" "${TM_WP_URL}/wp-json/tm/v1/ss/generate"

# TODO: Wait for on-server routines to complete.

# Remove current IP from the firewall rules.
aws ec2 revoke-security-group-ingress --group-id "${TM_AWS_SECURITY_GROUP}" --protocol tcp --port 443 --cidr="${CURRENT_IP}"/32
aws ec2 revoke-security-group-ingress --group-id "${TM_AWS_SECURITY_GROUP}" --protocol tcp --port "${TM_AWS_SSH_PORT}" --cidr="${CURRENT_IP}"/32

# TODO: If first INSTANCE_STATE was stopped, shutting-down or stopping, run `aws ec2 stop-instances --instance-ids "${TM_AWS_INSTANCE}"`
