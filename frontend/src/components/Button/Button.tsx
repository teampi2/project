import MuiButton, { ButtonProps as MuiButtonProps } from '@mui/material/Button'
import { styled } from '@mui/material/styles'

interface ButtonProps extends MuiButtonProps {
  uppercase?: boolean
}

const StyledButton = styled(MuiButton)<ButtonProps>(({ uppercase }) => ({
  textTransform: uppercase ? 'uppercase' : 'none',
}))

export function Button(props: ButtonProps) {
  return <StyledButton {...props} />
}
